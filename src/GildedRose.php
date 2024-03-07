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
                case 'Backstage passes to a TAFKAL80ETC concert':
                    $this->updateSpecialItem($item);
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
        if ($item->quality < 50) {
            $item->quality++;
            if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->sellIn < 11) {
                    $item->quality++;
                }
                if ($item->sellIn < 6) {
                    $item->quality++;
                }
            }
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