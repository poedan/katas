<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Item;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $this->handleQuality($item);
        }
    }

    function handleQuality (Item $item) {

        switch ($item->getName()) {
            case 'Aged Brie':
                $item->handleSell();
                $item->increaseQuality();
                if ($item->sell_in < 0) {
                    $item->increaseQuality();
                }
                break;
            case 'Sulfuras, Hand of Ragnaros':
                break;
            case  'Backstage passes to a TAFKAL80ETC concert':
                $item->handleSell();
                $item->increaseQuality();
                if ($item->sell_in < 10) {
                    $item->increaseQuality();
                }
                if ($item->sell_in < 5) {
                    $item->increaseQuality();
                }
                if ($item->sell_in < 0) {
                    $item->quality = 0;
                }
                break;

            case substr( $item->getName(), 0, 8 ) === "Conjured" :
                $item->handleSell();
                $item->decreaseQuality();
                $item->decreaseQuality();
                if ($item->sell_in < 0) {
                    $item->decreaseQuality();
                    $item->decreaseQuality();
                }

                break;

            default:
                $item->processItem();

        }

    }


}
