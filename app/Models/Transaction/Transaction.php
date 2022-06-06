<?php

namespace App\Models\Transaction;

use App\Models\Event\EventId;
use App\Models\User\UserId;

class Transaction
{
    private TransactionId $id;
    private TransactionType $transaction_type;
    private UserId $sender;
    private EventId $event_receiver;
    private float $price;
    private float $amount;
}
