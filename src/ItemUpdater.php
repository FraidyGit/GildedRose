<?php
declare(strict_types=1);

namespace GildedRose;

class ItemUpdater
{
    public function update(Item $item): void
    {
        if ($item->quality > 0) {
            $item->quality--;
        }
    }
}
