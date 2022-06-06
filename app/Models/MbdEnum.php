<?php

namespace App\Models;

use Exception;
use ReflectionClass;

abstract class MbdEnum
{
    private mixed $value;

    /**
     * @throws Exception
     */
    public function __construct($value)
    {
        $reflection = new ReflectionClass(static::class);
        foreach ($reflection->getConstants() as $val) {
            if ($value == $val) {
                $this->value = $value;
            }
        }

        if (!isset($this->value)) {
            throw new Exception("invalid enum type");
        }
    }

    /**
     * @param mixed $value
     * @return bool
     */
    public function valueIs(mixed $value): bool
    {
        return $this->value == $value;
    }

    /**
     * @return mixed
     */
    public function getValue(): mixed
    {
        return $this->value;
    }
}
