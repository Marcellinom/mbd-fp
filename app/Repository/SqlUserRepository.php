<?php

namespace App\Repository;

use App\Models\Region\RegionId;
use App\Models\Role\RoleId;
use App\Models\User\User;
use App\Models\User\UserId;
use DateTime;
use Exception;
use Illuminate\Support\Facades\DB;

class SqlUserRepository
{
    /**
     * @throws Exception
     */
    public function find(UserId $id): ?User
    {
        $rows = DB::select(
            "select * from user where id = ?", [$id->toString()]
        );
        if (!isset($rows[0])) return null;
        $row = $rows[0];
        return new User(
            new UserId($row->id),
            new RoleId($row->role_id),
            new RegionId($row->region_id),
            new DateTime($row->tanggal_lahir),
            $row->name,
            $row->username
        );
    }

    public function persist(User $user): void
    {
        DB::select(
            "begin tran
                if exists (select * from user with (updlock,serializable) where id = ?)
                begin
                   update table set
                   id = ?, role_id = ?, region_id = ?, tanggal_lahir = ?, name = ?, username = ?
                   where id = ?
                end
                else
                begin
                   insert into table (id, role_id, region_id, tanggal_lahir, name, username)
                   values (?, ?, ?, ?, ?, ?)
                end
                commit tran
               ",
            [
                $user->getId()->toString(),
                $user->getId()->toString(),
                $user->getRoleId()->toString(),
                $user->getRegionId()->toString(),
                $user->getTanggalLahir(),
                $user->getName(),
                $user->getUsername(),
                $user->getId()->toString(),
                $user->getId()->toString(),
                $user->getRoleId()->toString(),
                $user->getRegionId()->toString(),
                $user->getTanggalLahir(),
                $user->getName(),
                $user->getUsername(),
            ]
        );
    }
}
