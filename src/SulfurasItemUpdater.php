<?php
declare(strict_types=1);

namespace GildedRose;

class SulfurasItemUpdater implements IItemUpdater
{
    public function update(Item $item): void
    {
        // Sulfuras quality and sellIn remain constant, so no action needed
    }
}