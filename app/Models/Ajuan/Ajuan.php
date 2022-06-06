<?php

namespace App\Models\Ajuan;

use App\Models\Region\RegionId;
use App\Models\User\UserId;
use DateTime;

class Ajuan
{
    private AjuanId $id;
    private UserId $id_pengaju;
    private RegionId $region_id;
    private AjuanStatus $status;
    private int $minimal_volunteer;
    private int $minimal_tanaman;
    private int $minimal_transporter;
    private DateTime $time_limit;
    /**
     * @var AppliedUser[]
     */
    private array $applied_users;
}
