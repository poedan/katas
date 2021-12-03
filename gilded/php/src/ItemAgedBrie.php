<?php


namespace GildedRose;

use GildedRose\Item;

class ItemAgedBrie extends Item
{

    public function processItem () : void
    {
        $this->handleSell();
        $this->increaseQuality();
        if ($this->sell_in < 0) {
            $this->increaseQuality();
        }
    }

}