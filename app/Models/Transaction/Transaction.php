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

    /**
     * @param TransactionId $id
     * @param TransactionType $transaction_type
     * @param UserId $sender
     * @param EventId $event_receiver
     * @param float $price
     * @param float $amount
     */
    public function __construct(TransactionId $id, TransactionType $transaction_type, UserId $sender, EventId $event_receiver, float $price, float $amount)
    {
        $this->id = $id;
        $this->transaction_type = $transaction_type;
        $this->sender = $sender;
        $this->event_receiver = $event_receiver;
        $this->price = $price;
        $this->amount = $amount;
    }

    /**
     * @return TransactionId
     */
    public function getId(): TransactionId
    {
        return $this->id;
    }

    /**
     * @return TransactionType
     */
    public function getTransactionType(): TransactionType
    {
        return $this->transaction_type;
    }

    /**
     * @return UserId
     */
    public function getSender(): UserId
    {
        return $this->sender;
    }

    /**
     * @return EventId
     */
    public function getEventReceiver(): EventId
    {
        return $this->event_receiver;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }
}
