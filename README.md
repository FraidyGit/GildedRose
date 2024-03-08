GildedRose Kata - PHP Edition

Welcome to the PHP version of the GildedRose Kata! In this exercise, you'll be working on improving and extending the functionality of a small inn called Gilded Rose, managed by the friendly innkeeper Allison.
Overview

At Gilded Rose, all items have a SellIn value denoting the number of days left to sell the item, and a Quality value indicating its value. Here's a brief overview of how the system operates:

    Each day, both the SellIn and Quality values of all items are updated.
    As an item's sell-by date approaches, its quality decreases. Once the sell-by date has passed, quality degrades twice as fast.
    The quality of an item is never negative.
    Some items have special behavior:
        "Aged Brie" increases in quality over time.
        "Sulfuras" is a legendary item and never decreases in quality or has to be sold.
        "Backstage passes" increase in quality as the sell-by date approaches, with special rules for when the concert is near.
        The newly added "Conjured" items degrade in quality twice as fast as normal items.

Changes and Improvements

In this version of the Kata, we've made several enhancements:

    Implementation of comprehensive tests to ensure the reliability of the code.
    Refactoring of the existing codebase to enhance efficiency and readability. This includes consolidating duplicate code and breaking down complex functions into smaller, manageable ones.
    Introduction of the new "Conjured" item feature to the system.

    Installation

To get started, ensure you have the following installed on your system:

    PHP 8.0+
    Composer

Clone the repository to your local machine:

git clone git@github.com:kailahartman/GildedRose.git

or

git clone https://github.com/kailahartman/GildedRose.git

Navigate to the project directory:

cd GildedRose

Install dependencies using Composer:

composer install

Testing:

To run PHPUnit tests:

composer tests

To generate a coverage report:

composer test-coverage

Folders:
src - contains the classes:
Item.php
GildedRose.php - this class is refactored, and includes the new feature
in this class thers a class for each Item

tests - contains the tests

GildedRoseTest.php - includes the tests

texttest_fixture.php  could be used by an ApprovalTests, or run from the command line