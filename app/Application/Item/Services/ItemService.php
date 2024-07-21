<?php

namespace App\Application\Item\Services;

use App\Domain\Item\Entities\Item;
use App\Domain\Item\Repositories\ItemRepositoryInterface;
use App\Domain\Item\ValueObjects\ItemDescription;
use App\Domain\Item\ValueObjects\ItemId;
use App\Domain\Item\ValueObjects\ItemName;
use App\Domain\Item\ValueObjects\ItemPrice;

class ItemService
{
    protected $itemRepository;

    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function getAllItems(): array
    {
        return $this->itemRepository->findAll();
    }

    public function getItemById(int $id): ?Item
    {
        return $this->itemRepository->findById(new ItemId($id));
    }

    public function createItem(array $data): void
    {
        $item = new Item(new ItemId(0), new ItemName($data['name']), new ItemDescription($data['description']), new ItemPrice($data['price']));
        $this->itemRepository->save($item);
    }

    public function updateItem(int $id, array $data): void
    {
        $item = $this->itemRepository->findById(new ItemId($id));
        if ($item !== null) {
            $updateItem = new Item(new ItemId(0), new ItemName($data['name']), new ItemDescription($data['description']), new ItemPrice($data['price']));
            $this->itemRepository->save($updateItem);
        }
    }

    public function deleteItem(int $id): void
    {
        $this->itemRepository->delete(new ItemId($id));
    }
}
