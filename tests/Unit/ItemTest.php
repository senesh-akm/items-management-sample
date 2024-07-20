<?php

namespace Tests\Unit;

use App\Domain\Item\Entities\Item;
use App\Domain\Item\ValueObjects\ItemDescription;
use App\Domain\Item\ValueObjects\ItemId;
use App\Domain\Item\ValueObjects\ItemName;
use App\Domain\Item\ValueObjects\ItemPrice;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testCreateItem()
    {
        $item = new Item(new ItemId(1), new ItemName('Item Name'), new ItemDescription('Item Description'), new ItemPrice(100));
        $this->assertEquals('Item Name', $item->getName()->getValue());
        $this->assertEquals('Item Description', $item->getDescription()->getValue());
        $this->assertEquals(100, $item->getPrice()->getValue());
    }
}
