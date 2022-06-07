<?php

namespace App\Repository;

use App\Models\Region\RegionId;
use App\Models\Role\RoleId;
use App\Models\User\User;
use App\Models\User\UserId;
use DateTime;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function create(User $user, string $password): void
    {
        DB::insert("insert into user (id, role_id, region_id, tanggal_lahir, name, username, password)
                    values (?,?,?,?,?,?)", [
            $user->getId()->toString(),
            $user->getRegionId()->toString(),
            $user->getRoleId()->toString(),
            $user->getName(),
            $user->getTanggalLahir(),
            $user->getUsername(),
            Hash::make($password)
        ]);
    }

    public function update(User $user): void
    {
        DB::insert("update user
                    set id = ?, role_id = ?, region_id = ?, tanggal_lahir = ?, name = ?, username = ?
                    where id = ?", [
            $user->getId()->toString(),
            $user->getRegionId()->toString(),
            $user->getRoleId()->toString(),
            $user->getName(),
            $user->getTanggalLahir(),
            $user->getUsername(),
            $user->getId()->toString(),
        ]);
    }
}
