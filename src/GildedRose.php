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
                    // Sulfuras quality and sellIn remain constant, so no action needed
                    break;
                default:
                    $this->updateNormalItem($item);
                    break;
            }
    
            // Decrease sellIn for all items except Sulfuras
            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                $item->sellIn--;
            }
    
            // Adjust quality for expired items
            if ($item->sellIn < 0) {
                $this->updateExpiredItem($item);
            }
        }
    }
    
    private function updateSpecialItem(Item $item): void
    {
        switch ($item->name) {
            case 'Aged Brie':
                $this->updateAgedBrie($item);
                break;
            case 'Backstage passes to a TAFKAL80ETC concert':
                $this->updateBackstagePasses($item);
                break;
            default:
                $this->increaseQuality($item);
                break;
        }
    }
    
    private function updateNormalItem(Item $item): void
    {
        if ($item->quality > 0) {
            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                $item->quality--;
            }
        }
    }
    private function updateAgedBrie(Item $item): void
{
    $this->increaseQuality($item);
}

private function updateBackstagePasses(Item $item): void
{
    $this->increaseQuality($item);
    $this->increaseQualityIfSellInLessThan($item, 11);
    $this->increaseQualityIfSellInLessThan($item, 6);
}

private function increaseQuality(Item $item): void
{
    if ($item->quality < 50) {
        $item->quality++;
    }
}

private function increaseQualityIfSellInLessThan(Item $item, int $threshold): void
{
    if ($item->sellIn < $threshold && $item->quality < 50) {
        $item->quality++;
    }
}
    
    private function updateExpiredItem(Item $item): void
    {
        switch ($item->name) {
            case 'Aged Brie':
                $this->updateSpecialItem($item);
                break;
            case 'Backstage passes to a TAFKAL80ETC concert':
                $item->quality = 0;
                break;
            default:
                $this->updateNormalItem($item);
                break;
        }
    }
    
}