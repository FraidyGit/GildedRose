<?php

// declare(strict_types=1);

// namespace Tests;

// use GildedRose\GildedRose;
// use GildedRose\Item;
// use PHPUnit\Framework\TestCase;

// class GildedRoseTest extends TestCase
// {
//     public function testFoo(): void
//     {
//         $items = [new Item('foo', 0, 0)];
//         $gildedRose = new GildedRose($items);
//         $gildedRose->updateQuality();
//         $this->assertSame('fixme', $items[0]->name);
//     }
// }
declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    // public function testUpdateQualityForFooItem(): void
    // {
    //     // Arrange
    //     $items = [new Item('foo', 0, 0)];
    //     $gildedRose = new GildedRose($items);

    //     // Act
    //     $gildedRose->updateQuality();

    //     // Assert
    //     $this->assertSame('foo', $items[0]->name);
    //     $this->assertSame(-1, $items[0]->sellIn);
    //     $this->assertSame(0, $items[0]->quality);
    // }
    public function testUpdateQualityForNormalItem(): void
    {
        // Arrange
        $items = [new Item('Normal Item', 10, 20)];
        $gildedRose = new GildedRose($items);

        // Act
        $gildedRose->updateQuality();

        // Assert
        $this->assertSame('Normal Item', $items[0]->name);
        $this->assertSame(9, $items[0]->sellIn);
        $this->assertSame(19, $items[0]->quality);
    }

    public function testUpdateQualityForAgedBrie(): void
    {
        // Arrange
        $items = [new Item('Aged Brie', 5, 10)];
        $gildedRose = new GildedRose($items);

        // Act
        $gildedRose->updateQuality();

        // Assert
        $this->assertSame('Aged Brie', $items[0]->name);
        $this->assertSame(4, $items[0]->sellIn);
        $this->assertSame(11, $items[0]->quality);
    }

    public function testUpdateQualityForBackstagePasses(): void
    {
        // Arrange
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20)];
        $gildedRose = new GildedRose($items);

        // Act
        $gildedRose->updateQuality();

        // Assert
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
        $this->assertSame(14, $items[0]->sellIn);
        $this->assertSame(21, $items[0]->quality);
    }

    public function testUpdateQualityForSulfuras(): void
    {
        // Arrange
        $items = [new Item('Sulfuras, Hand of Ragnaros', 0, 80)];
        $gildedRose = new GildedRose($items);

        // Act
        $gildedRose->updateQuality();

        // Assert
        $this->assertSame('Sulfuras, Hand of Ragnaros', $items[0]->name);
        $this->assertSame(0, $items[0]->sellIn);
        $this->assertSame(80, $items[0]->quality);
    }
}

