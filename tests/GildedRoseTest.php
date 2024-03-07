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
        $items = [new Item('Normal Item', 10, 20)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Normal Item', $items[0]->name);
        $this->assertSame(9, $items[0]->sellIn);
        $this->assertSame(19, $items[0]->quality);
    }
    public function testElixirOfTheMongooseBeforeSellInDate(): void
    {
        $items = [new Item('Elixir of the Mongoose', 10, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, 9);
        $this->assertEquals($items[0]->quality, 9);
    }
    public function testAgedBrieAtTheBeginning(): void
    {
        $items = [new Item('Aged Brie', 2, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, 1);
        $this->assertEquals($items[0]->quality, 1);
    }
    public function testAgedBrieWhenSellInZero(): void
    {
        $items = [new Item('Aged Brie', 0, 2)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, -1);
        $this->assertEquals($items[0]->quality, 4);
    }
}

