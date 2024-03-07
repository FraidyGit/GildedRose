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

}

