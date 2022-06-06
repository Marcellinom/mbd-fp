<?php

namespace App\Models;

use Exception;
use Ramsey\Uuid\Uuid;

trait UuidTrait
{
    private string $id;

    /**
     * @param string $id
     * @throws Exception
     */
    public function __construct(string $id)
    {
        if (!Uuid::isValid($id)) {
            throw new Exception("Invalid Uuid");
        }
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->id;
    }
}
