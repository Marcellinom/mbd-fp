<?php

namespace App\Http\Controllers;

use App\Models\Ajuan\AjuanStatus;
use App\Models\Role\RoleType;
use App\Models\Transaction\TransactionType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;
use Throwable;

class HomeController extends Controller
{
    /**
     * @throws Throwable
     */
    public function registerUser(Request $request)
    {
        switch ($request->input('role')) {
            case 1:
                $role = RoleType::VOLUNTEER;
                break;
            case 2:
                $role = RoleType::EVENT_ORGANIZER;
                break;
            case 3:
                $role = RoleType::SUPPLIER;
                break;
            case 4:
                $role = RoleType::TRANSPORTER;
                break;
            default:
                throw new Exception("invalid role type");
        }
        DB::beginTransaction();
        try {
            // query untuk insert user ke db
            DB::insert("
            insert into user (id, role_id, name, username, password)
            values (?, (select id from role where role_type = ?), ?, ?, ?)
            ", [Uuid::uuid4()->toString(), $role, $request->input('name'), $request->input('name'),
                Hash::make($request->input('password'))
            ]);
        } catch (Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return redirect('login');
    }

    public function login(Request $request)
    {
        $user = DB::selectOne("
            select u.id as user_id, password, role_type from user u, role r
            where u.username = ? and r.id = u.role_id
        ", [$request->input('username')]);

        if (!Hash::check($request->input('password'), $user->password)) {
            return redirect('login');
        }
        Session::put('user_id', $user->user_id);
        switch ($user->role_type) {
            case RoleType::VOLUNTEER:
                return redirect('volunteer');
            case RoleType::EVENT_ORGANIZER:
                return redirect('event');
            case RoleType::SUPPLIER:
                return redirect('supplier');
            case RoleType::TRANSPORTER:
                return $this->redirectToTransporter($user);
        }
        return redirect('login');
    }

    public function redirectToVolunteer()
    {
        $events = DB::select("
            select id, nama_event, (
                select count(1) from applied_user_ajuan where ajuan_id = id
            ) as participant from ajuan
        ");
        $applied_events = DB::table('applied_user_ajuan')->where('user_id', Session::get('user_id'))->get();
        $applied_event_ids = [];
        foreach ($applied_events as $applied_event) {
            $applied_event_ids[] = $applied_event->ajuan_id;
        }
        return view('volunteer', compact('events', 'applied_event_ids'));
    }

    public function redirectToEventOrganizer()
    {
        $rows = DB::select("
            select id, nama_event, (
                select count(1) from applied_user_ajuan
                where ajuan_id = id
            ) as volunteer, (
                select coalesce(sum(amount), 0) from transaction
                where ajuan_event_receiver = id
            ) as pohon,
            (
                case when is_eligible = true then 'kuota sudah terpenuhi'
                else 'kuota belum terpenuhi'
                end
            ) as is_eligible
            from ajuan
        ");
        return view('event', compact('rows'));
    }

    public function volunteerDaftar(Request $request)
    {
        DB::beginTransaction();
        try {
            DB::insert("
                insert into applied_user_ajuan (ajuan_id, user_id)
                values (?, ?)
            ", [$request->input('ajuan_id'), $request->input('user_id')]);
        } catch (Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return redirect('volunteer');
    }

    public function redirectToSupplier()
    {
        $rows = DB::select("
            select a.id, a.nama_event, a.minimal_tanaman, (
                select coalesce(sum(amount), 0) from transaction
                where ajuan_event_receiver = a.id
            ) as pohon
            from ajuan a
        ");
        return view('supplier', compact('rows'));
    }

    public function supplyPohon(Request $request)
    {
        DB::beginTransaction();
        try {
            DB::insert("
                insert into transaction (id, transaction_type, sender, ajuan_event_receiver, price, amount)
                values (?, ?, ?, ?, ?, ?)
            ", [Uuid::uuid4()->toString(), TransactionType::TREE_SUPPLIED,
                $request->input('user_id'),
                $request->input('ajuan_id'),
                $request->input('harga_pohon'),
                $request->input('jumlah_pohon_disupply')
            ]);
        } catch (Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return redirect('supplier');
    }

    public function redirectToTransporter(object $row)
    {

    }

    public function getCreateEvent()
    {
        $regions = DB::select("select * from region");
        return view('create-event', compact('regions'));
    }

    public function postCreateEvent(Request $request)
    {
        DB::beginTransaction();
        try {
            DB::insert("
                insert into ajuan (
                   id, nama_event, user_id_pengaju, region_id, status,
                   minimal_volunteer, minimal_tanaman, time_limit, is_eligible
                )
                values (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ", [
                Uuid::uuid4()->toString(),
                $request->input('nama_event'),
                $request->input('user_id'),
                $request->input('region'),
                AjuanStatus::WAITING_FOR_QUOTA,
                $request->input('minimal_volunteer'),
                $request->input('minimal_pohon'),
                $request->input('date_limit'),
                false
            ]);
        } catch (Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return redirect('event');
    }
}
