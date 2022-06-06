<?php

namespace App\Models\Role;

use App\Models\MbdEnum;

class RoleType extends MbdEnum
{
    public const EVENT_ORGANIZER = 'Event Organizer';
    public const VOLUNTEER = 'Volunteer';
    public const SUPPLIER = 'Supplier';
    public const TRANSPORTER = 'Transporter';
}
