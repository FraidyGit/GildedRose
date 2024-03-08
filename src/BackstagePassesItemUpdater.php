<?php
declare(strict_types=1);

namespace GildedRose;
class BackstagePassesItemUpdater
{
    public function update(Item $item): void
    {
        $this->increaseQuality($item);
        if ($item->sellIn < 11) {
            $this->increaseQuality($item);
        }
        if ($item->sellIn < 6) {
            $this->increaseQuality($item);
        }
    }
    private function increaseQuality(Item $item): void
    {
        if ($item->quality < 50) {
            $item->quality++;
        }
    }
}