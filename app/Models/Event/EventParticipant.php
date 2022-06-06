<?php

namespace App\Models\Event;

use App\Models\User\UserId;

class EventParticipant
{
    private UserId $user_id;
    private bool $dari_luar_daerah;
}
