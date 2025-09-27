# Hizbs Warsh Dataset - JavaScript Usage

This document provides examples and documentation for using the Hizbs Warsh Dataset in JavaScript/Node.js projects.

## Installation

Install via npm:

```bash
npm install hizbs-warsh-dataset
```

## Basic Usage

```javascript
const {
  hizbs,
  getHizbById,
  getHizbByOrderUp,
  getHizbByOrderDown,
  listAll,
} = require("hizbs-warsh-dataset");

// Get all hizbs
const allHizbs = listAll();

// Get a specific hizb by ID
const hizb = getHizbById(1);

// Get hizb by order (up-to-down: 1-60)
const hizbByOrder = getHizbByOrderUp(30);

// Get hizb by order (down-to-top: 1-60)
const hizbByOrderDown = getHizbByOrderDown(15);
```

## Available Methods

### Core Methods

- `listAll()`: Get all 60 hizbs (returns the `hizbs` array)
- `getHizbById(id)`: Get hizb by ID (1-60)
- `getHizbByOrderUp(order)`: Get hizb by top-down order (1-60)
- `getHizbByOrderDown(order)`: Get hizb by bottom-up order (1-60)

### Direct Data Access

- `hizbs`: Direct access to the array of all 60 hizbs

## Data Structure

Each hizb object contains the following fields:

```javascript
{
    id: 1,
    name: "سبح - الأعلى",
    start_surah: "الأعلى",
    start_ayah: "سسَبِّحِ اِ۪سْمَ رَبِّكَ اَ۬لَاعْلَي",
    end_surah: "الناس",
    end_ayah: "مِنَ اَ۬لْجِنَّةِ وَالنَّاسِۖ",
    order_up_to_down: 60,
    order_down_to_top: 1,
    description: "الحزب الستون من القرآن الكريم، يبدأ من سورة الأعلى ويمتد إلى نهاية القرآن بسورة الناس، ويشمل السور القصيرة في الجزء الأخير"
}
```

## Advanced Usage Examples

### Search and Filter

```javascript
// Find hizbs by name pattern
const hizbsWithAmma = hizbs.filter((h) => h.name.includes("عمّ"));

// Find hizbs by surah
const hizbsWithNaba = hizbs.filter(
  (h) => h.start_surah === "النبأ" || h.end_surah === "النبأ"
);

// Get hizbs in a specific order range
const hizbsInRange = hizbs
  .filter((h) => h.order_up_to_down >= 1 && h.order_up_to_down <= 10)
  .sort((a, b) => a.order_up_to_down - b.order_up_to_down);
```

### Data Analysis

```javascript
// Count unique surahs
const uniqueStartSurahs = [...new Set(hizbs.map((h) => h.start_surah))];
const uniqueEndSurahs = [...new Set(hizbs.map((h) => h.end_surah))];

// Find longest hizb name
const longestName = hizbs.reduce((longest, current) =>
  current.name.length > longest.name.length ? current : longest
);

// Get random hizb
const randomHizb = hizbs[Math.floor(Math.random() * hizbs.length)];
```

### Export and Transform

```javascript
// Export as JSON
const jsonData = JSON.stringify(hizbs, null, 2);

// Create simplified structure
const simplifiedHizbs = hizbs.map((h) => ({
  id: h.id,
  name: h.name,
  order: h.order_up_to_down,
}));

// Group by order ranges
const hizbGroups = {
  first20: hizbs.filter((h) => h.order_up_to_down <= 20),
  middle20: hizbs.filter(
    (h) => h.order_up_to_down > 20 && h.order_up_to_down <= 40
  ),
  last20: hizbs.filter((h) => h.order_up_to_down > 40),
};
```

## Error Handling

The methods return `undefined` for invalid inputs:

```javascript
// These will return undefined
const invalid1 = getHizbById(70); // ID out of range
const invalid2 = getHizbById("1"); // String input
const invalid3 = getHizbByOrderUp(0); // Order out of range
const invalid4 = getHizbByOrderDown(-1); // Negative order

// Always check for undefined
const hizb = getHizbById(someId);
if (hizb) {
  console.log(`Found hizb: ${hizb.name}`);
} else {
  console.log("Hizb not found");
}
```

## Integration Examples

### Express.js API

```javascript
const express = require("express");
const {
  getHizbById,
  getHizbByOrderUp,
  listAll,
} = require("hizbs-warsh-dataset");

const app = express();

// Get all hizbs
app.get("/api/hizbs", (req, res) => {
  res.json({ hizbs: listAll() });
});

// Get hizb by ID
app.get("/api/hizbs/:id", (req, res) => {
  const hizb = getHizbById(parseInt(req.params.id));
  if (hizb) {
    res.json(hizb);
  } else {
    res.status(404).json({ error: "Hizb not found" });
  }
});

app.listen(3000);
```

### React Component

```javascript
import React, { useState, useEffect } from "react";
const { listAll, getHizbById } = require("hizbs-warsh-dataset");

function HizbSelector() {
  const [hizbs] = useState(listAll());
  const [selectedHizb, setSelectedHizb] = useState(null);

  const handleSelect = (id) => {
    setSelectedHizb(getHizbById(id));
  };

  return (
    <div>
      <select onChange={(e) => handleSelect(parseInt(e.target.value))}>
        <option value="">Select a Hizb</option>
        {hizbs.map((hizb) => (
          <option key={hizb.id} value={hizb.id}>
            {hizb.name}
          </option>
        ))}
      </select>

      {selectedHizb && (
        <div>
          <h3>{selectedHizb.name}</h3>
          <p>Order: {selectedHizb.order_up_to_down}</p>
          <p>Starts: {selectedHizb.start_surah}</p>
          <p>Ends: {selectedHizb.end_surah}</p>
        </div>
      )}
    </div>
  );
}
```

## Requirements

- Node.js >= 12.0.0
- No additional dependencies required

## License

MIT License - See LICENSE file for details.
