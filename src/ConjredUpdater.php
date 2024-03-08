<?php

declare(strict_types=1);

namespace GildedRose;


class ConjredUpdater implements IItemUpdater
{
    public function update(Item $item): void
    {
        if ($item->quality > 0 && $item->sellIn < 0) {
            $item->quality -= 4;
        } elseif ($item->quality > 0) {
            $item->quality -= 2;
        }
    }
}
