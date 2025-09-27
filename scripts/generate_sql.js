// scripts/generate-sql.js
const fs = require("fs");
const path = require("path");
const hizbs = require("../data/hizbs.json");

const tableName = "hizbs";

// Escape string for SQL safely
function escapeSQL(value) {
  if (value === null || value === undefined) return "NULL";
  return `'${String(value).replace(/'/g, "''")}'`;
}

// Generate CREATE TABLE statement
function createHizbsTable() {
  return `
CREATE TABLE IF NOT EXISTS ${tableName} (
    id INT PRIMARY KEY,
    number INT NOT NULL,
    topDown INT NOT NULL,
    bottomUp INT NOT NULL,
    name TEXT NOT NULL,
    start TEXT NOT NULL,
    end TEXT NOT NULL,
    start_surah INT,
    start_ayah INT,
    end_surah INT,
    end_ayah INT,
    order_up_to_down INT NOT NULL,
    order_down_to_top INT NOT NULL,
    description TEXT
);
  `.trim();
}

// Generate INSERT statements
function insertHizbs(data) {
  if (!data || !Array.isArray(data.hizbs)) {
    throw new Error("Invalid hizbs.json format. Expected { hizbs: [...] }");
  }

  const values = data.hizbs
    .map(
      (h) => `(
      ${h.id},
      ${h.number},
      ${h.topDown},
      ${h.bottomUp},
      ${escapeSQL(h.name)},
      ${escapeSQL(h.start)},
      ${escapeSQL(h.end)},
      ${h.start_surah ?? "NULL"},
      ${h.start_ayah ?? "NULL"},
      ${h.end_surah ?? "NULL"},
      ${h.end_ayah ?? "NULL"},
      ${h.order_up_to_down},
      ${h.order_down_to_top},
      ${escapeSQL(h.description)}
  )`
    )
    .join(",\n");

  return `INSERT INTO ${tableName} (
    id, number, topDown, bottomUp, name, start, end,
    start_surah, start_ayah, end_surah, end_ayah,
    order_up_to_down, order_down_to_top, description
  ) VALUES\n${values};`;
}

// Default output to /output/hizbs.sql
const outputDir = path.join(__dirname, "../output");
if (!fs.existsSync(outputDir)) {
  fs.mkdirSync(outputDir);
}
const outputPath =
  process.argv[2] || path.join(outputDir, "hizbs.sql");

const sql = `${createHizbsTable()}\n\n${insertHizbs(hizbs)}`;
fs.writeFileSync(outputPath, sql);

console.log(`SQL script generated at: ${outputPath}`);
