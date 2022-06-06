<?php

namespace App\Models\Ajuan;

use App\Models\MbdEnum;

class AjuanStatus extends MbdEnum
{
    public const ACCEPTED = 'Accepted';
    public const WAITING_FOR_QUOTA = 'Waiting for Quota Fill';
    public const REJECTED = 'Rejected';
}
