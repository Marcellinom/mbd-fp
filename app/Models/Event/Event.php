<?php

namespace App\Models\Event;

use App\Models\Region\RegionId;
use App\Models\User\UserId;

class Event
{
    private EventId $id;
    private RegionId $region_id;
    private UserId $initiator;
    /**
     * @var EventParticipant[]
     */
    private array $volunteers;
    /**
     * @var EventParticipant[]
     */
    private array $suppliers;
    /**
     * @var EventParticipant[]
     */
    private array $transporters;
    private string $nama_event;
}
