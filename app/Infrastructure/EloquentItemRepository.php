<?php

namespace App\Infrastructure\Item\Repositories;

use App\Domain\Item\Entities\Item;
use App\Domain\Item\Repositories\ItemRepositoryInterface;
use App\Domain\Item\ValueObjects\ItemDescription;
use App\Domain\Item\ValueObjects\ItemId;
use App\Domain\Item\ValueObjects\ItemName;
use App\Domain\Item\ValueObjects\ItemPrice;
use App\Models\Item as ItemModel;

class EloquentItemRepository implements ItemRepositoryInterface
{
    public function findById(ItemId $id): ?Item
    {
        $item = ItemModel::find($id->getValue());
        if ($item === null) {
            return null;
        }
        return new Item(new ItemId($item->id), new ItemName($item->name), new ItemDescription($item->description), new ItemPrice($item->price));
    }

    public function findAll(): array
    {
        $items = ItemModel::all();
        return $items->map(function ($item) {
            return new Item(new ItemId($item->id), new ItemName($item->name), new ItemDescription($item->description), new ItemPrice($item->price));
        })->toArray();
    }

    public function save(Item $item): void
    {
        $itemModel = ItemModel::find($item->getId()->getValue()) ?? new ItemModel();
        $itemModel->name = $item->getName()->getValue();
        $itemModel->description = $item->getDescription()->getValue();
        $itemModel->price = $item->getPrice()->getValue();
        $itemModel->save();
    }

    public function delete(ItemId $id): void
    {
        ItemModel::destroy($id->getValue());
    }
}
