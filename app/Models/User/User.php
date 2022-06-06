<?php

namespace App\Models\User;

use App\Models\Region\RegionId;
use App\Models\Role\RoleId;
use Illuminate\Support\Facades\Date;

class User
{
    private UserId $id;
    private RoleId $role_id;
    private RegionId $region_id;
    private Date $tanggal_lahir;
    private string $name;
    private string $username;
}
