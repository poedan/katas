<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testFoo(): void
    {
        $items = [new Item('foo', 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('foo', $items[0]->name);
        $this->assertSame(-1, $items[0]->sell_in);
        $this->assertSame(0, $items[0]->quality);
        $this->assertSame("foo, -1, 0", strval($items[0]));
    }

    public function testSulfuras(): void
    {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 0, 80)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(0, $items[0]->sell_in);
        $this->assertSame(80, $items[0]->quality);
    }
    public function testBrie(): void
    {
        $items = [new Item('Aged Brie', 0, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(-1, $items[0]->sell_in);
        $this->assertSame(50, $items[0]->quality);
    }
    public function testTickets(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 10, 30),
            new Item('Backstage passes to a TAFKAL80ETC concert', 4, 30),
            new Item('Backstage passes to a TAFKAL80ETC concert', 4, 50),
            new Item('Backstage passes to a TAFKAL80ETC concert', 0, 30)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(9, $items[0]->sell_in);
        $this->assertSame(32, $items[0]->quality);
        $this->assertSame(3, $items[1]->sell_in);
        $this->assertSame(33, $items[1]->quality);
        $this->assertSame(3, $items[2]->sell_in);
        $this->assertSame(50, $items[2]->quality);
        $this->assertSame(-1, $items[3]->sell_in);
        $this->assertSame(0, $items[3]->quality);
    }
    public function testConjured(): void
    {
        $items = [new Item('Conjured foo', 10, 30),
                new Item('Conjured foo2', -1, 30)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(28, $items[0]->quality);
        $this->assertSame(26, $items[1]->quality);

    }
}
