##Gilded Rose Refactoring Kata

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
AgedBrieItemUpdater BackstagePassesItemUpdater ConjredUpdater ItemUpdater SulfurasItemUpdater - this are classes for each Item
IItemUpdater - a interface for the items
## Testing

PHPUnit is configured for testing, a composer script has been provided. To run the unit tests, from the root of the PHP
project run:

```shell script
composer tests
```

A Windows a batch file has been created, like an alias on Linux/Mac (e.g. `alias pu="composer tests"`), the same
PHPUnit `composer tests` can be run:

```shell script
pu.bat
```

### Tests with Coverage Report

To run all test and generate a html coverage report run:

```shell script
composer test-coverage
```

The test-coverage report will be created in /builds, it is best viewed by opening /builds/**index.html** in your
browser.

The [XDEbug](https://xdebug.org/download) extension is required for generating the coverage report.

## Code Standard

Easy Coding Standard (ECS) is configured for style and code standards, **PSR-12** is used. The current code is not upto
standard!

### Check Code

To check code, but not fix errors:

```shell script
composer check-cs
``` 

On Windows a batch file has been created, like an alias on Linux/Mac (e.g. `alias cc="composer check-cs"`), the same
PHPUnit `composer check-cs` can be run:

```shell script
cc.bat
