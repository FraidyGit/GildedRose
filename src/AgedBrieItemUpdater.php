<?php
declare(strict_types=1);

namespace GildedRose;

class AgedBrieItemUpdater
{
    public function update(Item $item): void
    {
        $this->increaseQuality($item);
    }

    private function increaseQuality(Item $item): void
    {
        if ($item->quality < 50) {
            $item->quality++;
        }
        
    }
}