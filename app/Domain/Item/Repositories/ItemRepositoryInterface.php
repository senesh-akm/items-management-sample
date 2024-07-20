<?php

namespace App\Domain\Item\Repositories;

use App\Domain\Item\Entities\Item;
use App\Domain\Item\ValueObjects\ItemId;

interface ItemRepositoryInterface
{
    public function findById(ItemId $id): ?Item;
    public function findAll();
    public function save(Item $item): void;
    public function delete(ItemId $id): void;
}
