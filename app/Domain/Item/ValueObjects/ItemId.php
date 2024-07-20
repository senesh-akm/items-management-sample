<?php

namespace App\Domain\Item\ValueObjects;

use InvalidArgumentException;

class ItemId
{
    private int $value;

    public function __construct(int $value)
    {
        if ($value <= 0) {
            throw new InvalidArgumentException('Item ID must be a positive integer.');
        }
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
