# Hizbs Warsh Dataset - PHP Usage

This document provides examples and documentation for using the Hizbs Warsh Dataset in PHP projects.

## Installation

Install via Composer:

```bash
composer require redadevcraft/quran-hizb-data
```

## Basic Usage

```php
<?php

require_once 'vendor/autoload.php';

use QuranData\HisbProvider;

// Get all hizbs
$allHizbs = HisbProvider::getAllHizbs();

// Get a specific hizb by ID
$hizb = HisbProvider::getHizbById(1);

// Get hizb by order (up-to-down: 1-60)
$hizb = HisbProvider::getHizbByOrderUpToDown(30);

// Get hizb by order (down-to-top: 1-60)
$hizb = HisbProvider::getHizbByOrderDownToTop(15);
```

## Available Methods

### Core Methods

- `getAllHizbs()`: Get all 60 hizbs
- `getHizbById(int $id)`: Get hizb by ID (1-60)
- `getHizbByOrderUpToDown(int $order)`: Get hizb by top-down order
- `getHizbByOrderDownToTop(int $order)`: Get hizb by bottom-up order

### Search Methods

- `getHizbsBySurah(string $surahName)`: Find hizbs containing a specific surah
- `searchHizbsByName(string $name, bool $exactMatch = false)`: Search by hizb name
- `getHizbsInRange(int $startOrder, int $endOrder)`: Get hizbs in order range

### Utility Methods

- `getHizbCount()`: Get total number of hizbs (60)
- `getRandomHizb()`: Get a randomly selected hizb
- `isValidHizbId(int $id)`: Validate hizb ID
- `isValidHizbOrder(int $order)`: Validate hizb order

### Export Methods

- `toJson(?int $hizbId = null)`: Export to JSON format
- `toXml()`: Export to XML format

## Data Structure

Each hizb contains the following fields:

```php
[
    'id' => 1,
    'name' => 'سبح - الأعلى',
    'start_surah' => 'الأعلى',
    'start_ayah' => 'سسَبِّحِ اِ۪سْمَ رَبِّكَ اَ۬لَاعْلَي',
    'end_surah' => 'الناس',
    'end_ayah' => 'مِنَ اَ۬لْجِنَّةِ وَالنَّاسِۖ',
    'order_up_to_down' => 60,
    'order_down_to_top' => 1,
    'description' => 'الحزب الستون من القرآن الكريم...'
]
```

## Error Handling

The provider includes proper error handling:

```php
try {
    $hizb = HisbProvider::getHizbById(1);
    if ($hizb === null) {
        echo "Hizb not found";
    }
} catch (RuntimeException $e) {
    echo "Error loading data: " . $e->getMessage();
} catch (InvalidArgumentException $e) {
    echo "Invalid argument: " . $e->getMessage();
}
```

## Requirements

- PHP >= 7.4
- JSON extension (usually included)
- SimpleXML extension (for XML export)

## License

MIT License - See LICENSE file for details.
