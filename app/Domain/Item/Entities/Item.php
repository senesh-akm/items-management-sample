<?php

namespace App\Domain\Item\Entities;

use App\Domain\Item\ValueObjects\ItemDescription;
use App\Domain\Item\ValueObjects\ItemId;
use App\Domain\Item\ValueObjects\ItemName;
use App\Domain\Item\ValueObjects\ItemPrice;

class Item
{
    private ItemId $id;
    private ItemName $name;
    private ItemDescription $description;
    private ItemPrice $price;

    public function __construct(ItemId $id, ItemName $name, ItemDescription $description, ItemPrice $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getId(): ItemId
    {
        return $this->id;
    }

    public function getName(): ItemName
    {
        return $this->name;
    }

    public function getDescription(): ItemDescription
    {
        return $this->description;
    }

    public function getPrice(): ItemPrice
    {
        return $this->price;
    }
}
