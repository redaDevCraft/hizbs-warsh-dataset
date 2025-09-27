# Hizbs Warsh Dataset

A comprehensive dataset of the Qur'an Hizb divisions, available in multiple formats and programming languages. This package provides the 60 hizbs of the Qur'an with both top-down and bottom-up numbering, making it easy to integrate into Islamic apps, educational platforms, or research projects.

## Features

- **Complete Dataset**: All 60 hizbs of the Qur'an
- **Multiple Formats**: JSON, XML and SQL
- **Dual Numbering**: Both up-to-down (1-60) and down-to-top (1-60) ordering
- **Multi-Language Support**: JavaScript/Node.js and PHP implementations
- **Rich Metadata**: Each hizb includes name, start/end surahs, ayahs, and descriptions
- **Easy Integration**: Simple APIs for both npm and Composer packages

## Installation

### Node.js/JavaScript (npm)

```bash
npm install hizbs-warsh-dataset
```

### PHP (Composer)

```bash
composer require redadevcraft/quran-hizb-data
```

## Usage

### JavaScript/Node.js

```javascript
const {
  getAllHizbs,
  getHizbById,
  getHizbByOrderUp,
  getHizbByOrderDown,
} = require("hizbs-warsh-dataset");

// Get all hizbs
const allHizbs = getAllHizbs();

// Get specific hizb by ID
const hizb = getHizbById(1);

// Get hizb by order (up-to-down)
const hizbByOrder = getHizbByOrderUp(30);

// Get hizb by order (down-to-top)
const hizbByOrderDown = getHizbByOrderDown(15);
```

### PHP

```php
<?php

require_once 'vendor/autoload.php';

use QuranData\HisbProvider;

// Get all hizbs
$allHizbs = HisbProvider::getAllHizbs();

// Get specific hizb by ID
$hizb = HisbProvider::getHizbById(1);

// Get hizb by order (up-to-down)
$hizbByOrder = HisbProvider::getHizbByOrderUpToDown(30);

// Get hizb by order (down-to-top)
$hizbByOrderDown = HisbProvider::getHizbByOrderDownToTop(15);
```

## Data Structure

Each hizb object contains the following fields:

```json
{
  "id": 1,
  "name": "سبح - الأعلى",
  "start_surah": "الأعلى",
  "start_ayah": "سسَبِّحِ اِ۪سْمَ رَبِّكَ اَ۬لَاعْلَي",
  "end_surah": "الناس",
  "end_ayah": "مِنَ اَ۬لْجِنَّةِ وَالنَّاسِۖ",
  "order_up_to_down": 60,
  "order_down_to_top": 1,
  "description": "الحزب الستون من القرآن الكريم، يبدأ من سورة الأعلى ويمتد إلى نهاية القرآن بسورة الناس، ويشمل السور القصيرة في الجزء الأخير"
}
```

## API Reference

### JavaScript API

- `getAllHizbs()`: Get all 60 hizbs
- `getHizbById(id)`: Get hizb by ID (1-60)
- `getHizbByOrderUp(order)`: Get hizb by up-to-down order
- `getHizbByOrderDown(order)`: Get hizb by down-to-top order
- `listAll()`: Alias for getAllHizbs()

### PHP API

#### Core Methods

- `HisbProvider::getAllHizbs()`: Get all 60 hizbs
- `HisbProvider::getHizbById(int $id)`: Get hizb by ID (1-60)
- `HisbProvider::getHizbByOrderUpToDown(int $order)`: Get hizb by top-down order
- `HisbProvider::getHizbByOrderDownToTop(int $order)`: Get hizb by bottom-up order

#### Search Methods

- `HisbProvider::getHizbsBySurah(string $surahName)`: Find hizbs containing a specific surah
- `HisbProvider::searchHizbsByName(string $name, bool $exactMatch = false)`: Search by hizb name
- `HisbProvider::getHizbsInRange(int $startOrder, int $endOrder)`: Get hizbs in order range

#### Utility Methods

- `HisbProvider::getHizbCount()`: Get total number of hizbs (60)
- `HisbProvider::getRandomHizb()`: Get a randomly selected hizb
- `HisbProvider::isValidHizbId(int $id)`: Validate hizb ID
- `HisbProvider::isValidHizbOrder(int $order)`: Validate hizb order

#### Export Methods

- `HisbProvider::toJson(?int $hizbId = null)`: Export to JSON format
- `HisbProvider::toXml()`: Export to XML format

## Available Formats

The dataset is available in multiple formats in the `data/` directory for quick copy-paste access:

- **JSON** (`data/hizbs.json`): Ready-to-use JSON format for web applications and APIs
- **XML** (`data/hizbs.xml`): XML format for XML-based systems and integrations
- **SQL** (`data/hizbs.sql`): SQL INSERT statements ready for database imports

Simply copy the contents of any file in the `data/` folder and paste directly into your project or database.

## Examples

Complete examples are available in the `examples/` directory:

- `examples/javascript-node/example.js`: Node.js usage examples
- `examples/php/example.php`: PHP usage examples
- `examples/php/README.md`: Detailed PHP documentation

## Scripts

The project includes utility scripts:

- `scripts/generate_sql.js`: Generate SQL format from JSON
- `scripts/generate_xml.js`: Generate XML format from JSON
- `scripts/validate.js`: Validate data integrity

## Testing

### PHP Tests

```bash
php tests/HisbProviderTest.php
```

## Hizb Numbering System

This dataset uses two numbering systems:

1. **Up-to-Down (order_up_to_down)**: Traditional numbering from 1-60, starting from the beginning of the Qur'an
2. **Down-to-Top (order_down_to_top)**: Reverse numbering from 1-60, starting from the end of the Qur'an

## Requirements

### Node.js

- Node.js >= 12.0.0

### PHP

- PHP >= 7.4
- JSON extension (usually included)
- SimpleXML extension (for XML export)

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Author

**Taleb Mohammed Reda**

- Email: talebmedreda@gmail.com
- GitHub: [@redadevcraft](https://github.com/redadevcraft)

## Acknowledgments

- The Qur'an text and structure
- The Islamic community for preserving this knowledge
- Contributors who help maintain and improve this dataset

## Changelog

### Version 1.0.0

- Initial release with complete 60 hizbs dataset
- JavaScript/Node.js package implementation
- PHP/Composer package implementation
- Multiple export formats (JSON, XML, SQL)
- Comprehensive test suites
- Complete documentation and examples
