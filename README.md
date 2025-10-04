Hizbs Warsh Dataset
![License: MIT](https://img.shields.io/badge/license-MIT-blue)
Important Disclaimer

- This project does **not** provide tafsir (interpretation) or religious rulings of the Qur'an. The
  dataset is intended strictly as a technical resource.
- The author is **not** a religious scholar; the author is a computer science specialist.
- Use this dataset as a data/tooling resource for software development, research, and educational
  applications; do not rely on it as a religious or jurisprudential reference.
  Overview
  Hizbs Warsh Dataset is a structured dataset of the 60 hizb divisions of the Qur'an. It is provided in
  multiple export formats and includes metadata designed to make integration into applications,
  research pipelines, and educational tools straightforward.
  Features
- Complete dataset of all 60 hizbs.
- Multiple formats: JSON, XML, SQL.
- Dual numbering support: up-to-down and down-to-top.
- Implementations / helper APIs for JavaScript/Node.js and PHP.
- Rich metadata per hizb: name, start/end surah, ayah indices, descriptions.
- Utility scripts for export generation and data validation.
Installation
Node.js / JavaScript (npm)
npm install hizbs-warsh-dataset
PHP (Composer)
composer require redadevcraft/quran-hizb-data
Usage
JavaScript / Node.js
const {
getAllHizbs,
getHizbById,
getHizbByOrderUp,
getHizbByOrderDown,
} = require("hizbs-warsh-dataset");
// Get all hizbs
const allHizbs = getAllHizbs();
// Get specific hizb by ID (1-60)
const hizb = getHizbById(1);
// Get hizb by order (up-to-down)
const hizbByOrder = getHizbByOrderUp(30);
// Get hizb by order (down-to-top)
const hizbByOrderDown = getHizbByOrderDown(15);
PHP
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
Data Structure
Each hizb entry is represented as an object with the following fields. Ayah fields may be
represented as numeric indices or as text depending on the export format.
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
API Reference
JavaScript API
- `getAllHizbs()`: Return all 60 hizbs.
- `getHizbById(id)`: Return a hizb by its ID (1–60).
- `getHizbByOrderUp(order)`: Return hizb by up-to-down order.
- `getHizbByOrderDown(order)`: Return hizb by down-to-top order.
- `listAll()`: Alias for `getAllHizbs()`.
  PHP API

#### Core Methods

- `HisbProvider::getAllHizbs()`: Get all 60 hizbs.
- `HisbProvider::getHizbById(int $id)`: Get hizb by ID (1–60).
- `HisbProvider::getHizbByOrderUpToDown(int $order)`: Get hizb by top-down order.
- `HisbProvider::getHizbByOrderDownToTop(int $order)`: Get hizb by bottom-up order.

#### Search Methods

- `HisbProvider::getHizbsBySurah(string $surahName)`: Find hizbs containing a specific surah.
- `HisbProvider::searchHizbsByName(string $name, bool $exactMatch = false)`: Search by hizb
  name.
- `HisbProvider::getHizbsInRange(int $startOrder, int $endOrder)`: Get hizbs in order range.

#### Utility Methods

- `HisbProvider::getHizbCount()`: Return 60.
- `HisbProvider::getRandomHizb()`: Randomly select a hizb.
- `HisbProvider::isValidHizbId(int $id)`: Validate ID.
- `HisbProvider::isValidHizbOrder(int $order)`: Validate order.

#### Export Methods

- `HisbProvider::toJson(?int $hizbId = null)`: Export to JSON (optionally a single hizb).
- `HisbProvider::toXml()`: Export full dataset to XML.
  Available Formats
  All dataset exports are stored in the `data/` directory.
- JSON: `data/hizbs.json`
- XML: `data/hizbs.xml`
- SQL: `data/hizbs.sql`
- Full Qur'an SQL (Athman): `data/full_coran/quran_athman.sql`
  Examples
  Example scripts and usage samples:
- `examples/javascript-node/example.js` — Node.js examples.
- `examples/php/example.php` — PHP examples.
- `examples/php/README.md` — Detailed PHP documentation.
  Scripts
  Utility scripts included in the repository:
- `scripts/generate_sql.js` — Generate SQL from JSON.
- `scripts/generate_xml.js` — Generate XML from JSON.
- `scripts/validate.js` — Validate dataset integrity.
  Testing
  PHP Tests
  php tests/HisbProviderTest.php
  Run tests to validate PHP provider functionality and data integrity.
  Hizb Numbering System

1. **Up-to-Down (`order_up_to_down`)**: Traditional numbering from 1 to 60, starting at the
   beginning of the Qur'an.
2. **Down-to-Top (`order_down_to_top`)**: Reverse numbering from 1 to 60, starting from the end
   of the Qur'an.
   Requirements
   **Node.js**

- Node.js >= 12.0.0
  **PHP**
- PHP >= 7.4
- JSON extension (standard)
- SimpleXML extension (for XML export)
  Contributing

1. Fork the repository.
2. Create a feature branch: `git checkout -b feature/your-feature`.
3. Commit your changes: `git commit -m "Describe your changes"`.
4. Push the branch: `git push origin feature/your-feature`.
5. Open a Pull Request describing your changes and rationale.
   License
   This project is licensed under the MIT License. See the `LICENSE` file for details.
   Author
   **Taleb Mohammed Reda**

- Email: talebmedreda@gmail.com
- GitHub: [@redadevcraft](https://github.com/redadevcraft)
  External Resources
  Useful repositories and datasets that complement this project:
- [Full Coran JSON with multiple riwayat](https://github.com/ibelarouci/coran/) — JSON formats with
  multiple riwayat.
- [Quran.com API](https://github.com/quran/quran.com-api) — REST API for Qur'an data,
  translations and tafsir endpoints.
- [Tanzil Quran Text](https://github.com/tanzil/quran-text) — Verified Qur'an text in multiple scripts
  and formats.
- [Quran JSON (semarketir)](https://github.com/semarketir/quranjson) — Qur'an dataset in JSON
  with detailed surah/ayah structure.
- [Quran (fawazahmed0)](https://github.com/fawazahmed0/quran) — Qur'an text and translations
  provided as JSON files.
- [AlQuran Cloud API](https://alquran.cloud/api) — Public Qur'an API with multiple recitations and
  translations.
- [Islamic Network API](https://github.com/islamic-network/api) — REST API offering Qur'an,
  Hadith, prayer times and other resources.
  Acknowledgments
- The Qur'an text and structure as preserved by the scholarly tradition.
- Open-source projects and contributors that made data integration and tooling possible.
- Contributors who help maintain and improve this dataset.
  Changelog
  Version 1.0.0
- Initial release with complete 60 hizbs dataset.
- JavaScript/Node.js package implementation.
- PHP/Composer package implementation.
- Exports in JSON, XML, and SQL.
- Test suites and documentation.
