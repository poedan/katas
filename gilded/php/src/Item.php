<?php

declare(strict_types=1);

namespace GildedRose;

final class Item
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $sell_in;

    /**
     * @var int
     */
    public $quality;

    public function __construct(string $name, int $sell_in, int $quality)
    {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    public function increaseQuality(): void
    {
        if ($this->quality < 50)  {
            $this->quality++;
        }
    }

    public function decreaseQuality(): void
    {
        if ($this->quality > 0) {
            $this->quality--;
        }
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function handleSell () : void
    {
        $this->sell_in--;
    }


    public function processItem () : void
    {
        $this->handleSell();
        $this->decreaseQuality();
        if ($this->sell_in < 0) {
            $this->decreaseQuality();
        }
    }

}
