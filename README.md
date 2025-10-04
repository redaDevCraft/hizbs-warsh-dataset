# Hizbs Warsh Dataset

![License: MIT](https://img.shields.io/badge/license-MIT-blue)
< Important **Disclaimer / تنبيه مهم**

> - This project does **not** provide tafsir (interpretation) or religious rulings of the
>   Qur'an. The dataset is intended strictly as a technical resource.
> - The author is **not** a religious scholar; the author is a computer science specialist.
> - Use this dataset as a data/tooling resource for software development, research, and
>   educational applications; do not rely on it as a religious or jurisprudential reference.
>
> يقدم تفسيراً أو أحكاماً شرعية للقرآن الكريم. هذه البيانات مُقدمة كمورد تقني فقط.
> < - هذا المشروع لا
> < - صاحب المشروع ليس عالِماً دينياً؛ هو متخصص في علوم الحاسوب.
> وأداة تقنية للتطوير والبحث والتعليم ولا يُعتد به كمصدر فقهي أو تفسير شرعي.

## < - يُستخدم هذا المشروع كمجموعة بيانات

## Overview / نظرة عامة

**English**
Hizbs Warsh Dataset is a structured dataset of the 60 hizb divisions of the Qur'an. It is
provided in multiple export formats and includes metadata designed to make integration
into applications, research pipelines, and educational tools straightforward.
**العربية**
بيانات وصفية تسهل دمجها في التطبيقات والأدوات التعليمية وعمليات البحث.
بيانات مُنظَّمة للأحزاب الستين من القرآن الكريم. تتوفر بصيغ متعددة وتتضمن
مجموعة بيانات "أحزاب ورش" هي

---

## Features / المزايا

**English**

- Complete dataset of all 60 hizbs.
- Multiple formats: JSON, XML, SQL.
- Dual numbering support: up-to-down and down-to-top.
- Implementations / helper APIs for JavaScript/Node.js and PHP.
- Rich metadata per hizb: name, start/end surah, ayah indices, descriptions.
- Utility scripts for export generation and data validation.
  **العربية**
- مجموعة كاملة لجميع الأحزاب الستين.
  SQL. ،LMX ،NOSJ :متعددة صيغ -
- دعم ترقيم ثنائي: من الأعلى إلى الأسفل ومن الأسفل إلى الأعلى.
- واجهات/مساعدات جاهزة لجافاسكربت (js.Node (وPHP.
- بيانات وصفية لكل حزب: الاسم، بداية/نهاية السورة، أرقام الآيات، وصف.
- سكربتات مساعدة لتوليد الصيغ والتحقق من صحة البيانات.

---

## Installation / التثبيت

**Node.js / JavaScript (npm)**

```bash
npm install hizbs-warsh-dataset
```

**PHP (Composer)**

```bash
composer require redadevcraft/quran-hizb-data
```

**العربية — التثبيت**
نفس الأوامر أعلاه تُستخدم لتثبيت الحزمة في مشاريع js.Node أو .PHP

---

## Usage / مثال الاستخدام

### JavaScript / Node.js

```javascript
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

**العربية — مثال الاستخدام**
أعلاه توضحان كيفية استرجاع كل الأحزاب أو حزب محدد في جافاسكربت وPHP.
الشفرتان

---

## Data Structure / بنية البيانات

Each hizb entry is represented as an object with the following fields. Ayah fields may be
represented as numeric indices or as text depending on the export format.

```json
{
  "id": 60,
  "name": "■■■ - ■■■■■■",
  "start_surah": "■■■■■■",
  "start_ayah_number": 1,
  "end_surah": "■■■■■",
  "end_ayah_number": 6,
  "order_up_to_down": 60,
  "order_down_to_top": 1,
  "description": "■■■■■ ■■■■■■ ■■ ■■■■■■ ■■■■■■■ ■■■■ ■■ ■■■■ ■■■■■■ ■■■■■ ■■■ ■■■■■ ■■■■■■ ■■■■■■ ■■■■■ ■■■■■ ■■■■■■■ ■■ ■■■■■ ■■■■■■"
}
```

**ملاحظة بالعربية**
قد تكتفي بالأرقام(. راجع ملفات `/data `للاطلاع على الصيغة الدقيقة لكل تصدير.
الحقول بين الصادرات )مثلاً بعض الصيغ قد تتضمن النص الكامل للآيات، وأخرى
يمكن أن تختلف صيغ

---

## API Reference / مرجع الواجهة البرمجية

### JavaScript API

- `getAllHizbs()`: Return all 60 hizbs.
- `getHizbById(id)`: Return a hizb by its ID (1–60).
- `getHizbByOrderUp(order)`: Return hizb by up-to-down order.
- `getHizbByOrderDown(order)`: Return hizb by down-to-top order.
- `listAll()`: Alias for `getAllHizbs()`.

### PHP API

#### Core Methods

- `HisbProvider::getAllHizbs()`: Get all 60 hizbs.
- `HisbProvider::getHizbById(int $id)`: Get hizb by ID (1–60).
- `HisbProvider::getHizbByOrderUpToDown(int $order)`: Get hizb by top-down order.
- `HisbProvider::getHizbByOrderDownToTop(int $order)`: Get hizb by bottom-up order.

#### Search Methods

- `HisbProvider::getHizbsBySurah(string $surahName)`: Find hizbs containing a specific
  surah.
- `HisbProvider::searchHizbsByName(string $name, bool $exactMatch = false)`: Search
  by hizb name.
- `HisbProvider::getHizbsInRange(int $startOrder, int $endOrder)`: Get hizbs in order
  range.

#### Utility Methods

- `HisbProvider::getHizbCount()`: Return 60.
- `HisbProvider::getRandomHizb()`: Randomly select a hizb.
- `HisbProvider::isValidHizbId(int $id)`: Validate ID.
- `HisbProvider::isValidHizbOrder(int $order)`: Validate order.

#### Export Methods

- `HisbProvider::toJson(?int $hizbId = null)`: Export to JSON (optionally a single hizb).
- `HisbProvider::toXml()`: Export full dataset to XML.
  **العربية — مرجع الواجهة البرمجية**
  توضح الدوال الأساسية والوظائف المساعدة المتاحة في حزمتَي جافاسكربت وPHP.
  القوائم أعلاه

---

## Available Formats / الصيغ المتاحة

All dataset exports are stored in the `data/` directory.

- JSON: `data/hizbs.json`
- XML: `data/hizbs.xml`
- SQL: `data/hizbs.sql`
- Full Qur'an SQL (Athman): `data/full_coran/quran_athman.sql`
  Copy the relevant file content to import into your application or database, or use the
  provided API helpers to load programmatically.
  **العربية**
  `data/full_coran/quran_athman.sql`. في متوفر SQL بصيغة الكامل القران ملف
  تجد جميع الصيغ في مجلد .`/data`

---

## Examples / أمثلة

Example scripts and usage samples:

- `examples/javascript-node/example.js` — Node.js examples.
- `examples/php/example.php` — PHP examples.
- `examples/php/README.md` — Detailed PHP documentation.
  **العربية**
  مُدرجة في مجلد `/examples `وتوضّح كيفية استخدام المكتبة في بيئات مختلفة.
  ملفات الأمثلة

---

## Scripts / سكربتات

Utility scripts included in the repository:

- `scripts/generate_sql.js` — Generate SQL from JSON.
- `scripts/generate_xml.js` — Generate XML from JSON.
- `scripts/validate.js` — Validate dataset integrity.
  **العربية**
  المذكورة تساعد في توليد الصيغ المختلفة والتحقق من سلامة البيانات.
  السكربتات

---

## Testing / الاختبارات

### PHP Tests

```bash
php tests/HisbProviderTest.php
```

Run tests to validate PHP provider functionality and data integrity.
**العربية**
نفّذ اختبارات PHP للتحقق من عمل موفر الأحزاب وسلامة البيانات.

---

## Hizb Numbering System / نظام ترقيم الأحزاب

1. **Up-to-Down (`order_up_to_down`)**: Traditional numbering from 1 to 60, starting at
   the beginning of the Qur'an.
2. **Down-to-Top (`order_down_to_top`)**: Reverse numbering from 1 to 60, starting
   from the end of the Qur'an.
   **العربية**
   من الأعلى للأسفل (`down_to_up_order (`يبدأ من بداية المصحف إلى نهايته.
3. الترميز
   من الأسفل للأعلى (`top_to_down_order (`يبدأ من نهاية المصحف إلى بدايته.
4. الترميز

---

## Requirements / المتطلبات

**Node.js**

- Node.js >= 12.0.0
  **PHP**
- PHP >= 7.4
- JSON extension (standard)
- SimpleXML extension (for XML export)
  **العربية**
  وPHP مذكورة أعلاه. تأكد من توفر امتدادات JSON وLMXelpmiS في بيئة PHP لديك.
  Node.js متطلبات

---

## Contributing / المساهمة

**English**

1. Fork the repository.
2. Create a feature branch: `git checkout -b feature/your-feature`.
3. Commit your changes: `git commit -m "Describe your changes"`.
4. Push the branch: `git push origin feature/your-feature`.
5. Open a Pull Request describing your changes and rationale.
   **العربية**
6. اعمل fork للمستودع.
   feature/your-feature`. -b checkout `git :للمزايا اًفرع أنشئ 2.
7. نفّذ التعديلات مع رسالة وصفية: git `commit m-" وصف التغييرات"`.
   feature/your-feature`. origin push `git :المستودع إلى الفرع ادفع 4.
8. افتح Pull Request ووضح التغييرات والأسباب.
   Please include tests and/or data validation for any changes that affect dataset structure
   or exports.
   **العربية**
   أو تحقق من صحة البيانات عند تعديل بنية البيانات أو سكربتات التصدير.
   يرجى إضافة اختبارات

---

## License / الترخيص

This project is licensed under the MIT License. See the `LICENSE` file for details.
**العربية**
المشروع مرخّص تحت رخصة .MIT راجع ملف `LICENSE `للمزيد من التفاصيل.

---

## Author / المؤلف

**Taleb Mohammed Reda**

- Email: talebmedreda@gmail.com
- GitHub: [@redadevcraft](https://github.com/redadevcraft)
  **العربية**
  **طالب محمد رضا**
  talebmedreda@gmail.com :الإلكتروني البريد -
- GitHub: [@redadevcraft](https://github.com/redadevcraft)

---

## External Resources / مصادر خارجية

Useful repositories and datasets that complement this project:

- [Full Coran JSON with multiple riwayat](https://github.com/ibelarouci/coran/) — JSON
  formats with multiple riwayat.
- [Quran.com API](https://github.com/quran/quran.com-api) — REST API for Qur'an data,
  translations and tafsir endpoints.
- [Tanzil Quran Text](https://github.com/tanzil/quran-text) — Verified Qur'an text in
  multiple scripts and formats.
- [Quran JSON (semarketir)](https://github.com/semarketir/quranjson) — Qur'an dataset
  in JSON with detailed surah/ayah structure.
- [Quran (fawazahmed0)](https://github.com/fawazahmed0/quran) — Qur'an text and
  translations provided as JSON files.
- [AlQuran Cloud API](https://alquran.cloud/api) — Public Qur'an API with multiple
  recitations and translations.
- [Islamic Network API](https://github.com/islamic-network/api) — REST API offering
  Qur'an, Hadith, prayer times and other resources.
  **العربية — مصادر مفيدة**
  تطبيقات مفيدة يمكن أن تُكمل هذا المشروع أو تُستخدم كمرجع في تطبيقاتك.
  قائمة بمشاريع وواجهات برمجة

---

## Acknowledgments / شكر وتقدير

- The Qur'an text and structure as preserved by the scholarly tradition.
- Open-source projects and contributors that made data integration and tooling possible.
- Contributors who help maintain and improve this dataset.
  **العربية**
- نص القرآن الكريم وبنيته كما نقلتها التقاليد العلمية.
- مشاريع المصادر المفتوحة والمساهمين الذين سهلوا تكامل البيانات والأدوات.
- كل من ساهم في صيانة وتحسين هذه المجموعة من البيانات.

---

## Changelog / سجل التغييرات

### Version 1.0.0

- Initial release with complete 60 hizbs dataset.
- JavaScript/Node.js package implementation.
- PHP/Composer package implementation.
- Exports in JSON, XML, and SQL.
- Test suites and documentation.
