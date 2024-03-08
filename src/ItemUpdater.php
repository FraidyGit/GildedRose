<?php
declare(strict_types=1);

namespace GildedRose;

class ItemUpdater implements IItemUpdater
{
    public function update(Item $item): void
    {
        if ($item->quality > 0 ) {
            $item->quality--;
        }
        if ($item->sellIn < 0) {
            $this->updateNormalItem($item);
        }
        
    }
}
