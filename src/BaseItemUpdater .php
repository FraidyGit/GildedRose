<?php

declare(strict_types=1);

namespace GildedRose;

  class BaseItemUpdater implements IItemUpdater
{

    // Common implementation of decreaseSellIn method
    public function decreaseSellIn(Item $item): void
    {
        if ($item->name != 'Sulfuras, Hand of Ragnaros') {
            $item->sellIn--;
        }
    }
}
