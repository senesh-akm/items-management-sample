<?php

namespace App\Domain\Item\ValueObjects;

use InvalidArgumentException;

class ItemName
{
    private string $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new InvalidArgumentException('Item name cannot be empty.');
        }
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
