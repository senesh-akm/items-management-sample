<?php

namespace App\Domain\Item\ValueObjects;

use InvalidArgumentException;

class ItemPrice
{
    private float $value;

    public function __construct(float $value)
    {
        if ($value < 0) {
            throw new InvalidArgumentException('Item price must be a non-negative value.');
        }
        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
