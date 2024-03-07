<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    private array $items;
    
        public function __construct(array $items)
    {
        $this->items = $items;
    }
    
 
public function updateQuality(): void
{
    foreach ($this->items as $item) {
        switch ($item->name) {
            case 'Aged Brie':
                $this->updateAgedBrie($item);
                break;
            case 'Backstage passes to a TAFKAL80ETC concert':
                $this->updateBackstagePasses($item);
                break;
            case 'Sulfuras, Hand of Ragnaros':
                // Sulfuras doesn't change, so no need to update
                break;
            default:
                $this->updateNormalItem($item);
                break;
        }
    }
}

private function updateAgedBrie(Item $item): void
{
    $this->increaseQuality($item);

    $item->sellIn--;

    if ($item->sellIn < 0) {
        $this->increaseQuality($item);
    }
}

private function updateBackstagePasses(Item $item): void
{
    $this->increaseQuality($item);

    if ($item->sellIn < 11) {
        $this->increaseQuality($item);
    }

    if ($item->sellIn < 6) {
        $this->increaseQuality($item);
    }

    $item->sellIn--;

    if ($item->sellIn < 0) {
        $item->quality = 0;
    }
}

private function updateNormalItem(Item $item): void
{
    $this->decreaseQuality($item);

    $item->sellIn--;

    if ($item->sellIn < 0) {
        $this->decreaseQuality($item);
    }
}

private function increaseQuality(Item $item): void
{
    if ($item->quality < 50) {
        $item->quality++;
    }
}

private function decreaseQuality(Item $item): void
{
    if ($item->quality > 0) {
        $item->quality--;
    }
}
}