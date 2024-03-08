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
            $item->sellIn--;

            switch ($item->name) {
                case 'Aged Brie':
                     $itemUpdater = new AgedBrieItemUpdater();   
                     break;               
                case 'Backstage passes to a TAFKAL80ETC concert':
                   $itemUpdater=new BackstagePassesItemUpdater();
                      break;
                case 'Conjred Mana Cake':
                    $itemUpdater=new ConjredUpdater();
                    break;      
                case 'Sulfuras, Hand of Ragnaros':
                     $itemUpdater = new SulfurasItemUpdater();
                     break;
                default:
                    $itemUpdater = new ItemUpdater();
                    break;
            }
            $itemUpdater->update($item);           

            // Adjust quality for expired items
            if ($item->sellIn < 0) {
                $this->updateExpiredItem($item);
            }
        }
    }



    private function updateNormalItem(Item $item): void
    {
        if ($item->quality > 0 && $item->name !== 'Sulfuras, Hand of Ragnaros') {
            $item->quality--;
        }
    }

    private function updateExpiredItem(Item $item): void
    {
        switch ($item->name) {
            case 'Aged Brie':
                $this->increaseQuality($item);
                break;
            case 'Backstage passes to a TAFKAL80ETC concert':
                $item->quality = 0;
                break;
            default:
                $this->updateNormalItem($item);
                break;
        }
    }

    private function increaseQuality(Item $item): void
    {
        if ($item->quality < 50) {
            $item->quality++;
        }
    }
    }
    
   
    
