<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use QuranData\HisbProvider;

// Example usage of the HisbProvider class

echo "=== Hizbs Warsh Dataset - PHP Example ===\n\n";

try {
    // Get total count of hizbs
    $totalHizbs = HisbProvider::getHizbCount();
    echo "Total number of hizbs: {$totalHizbs}\n\n";

    // Get a specific hizb by ID
    echo "=== Get Hizb by ID (5) ===\n";
    $hizb = HisbProvider::getHizbById(5);
    if ($hizb) {
        echo "Name: {$hizb['name']}\n";
        echo "Start Surah: {$hizb['start_surah']}\n";
        echo "End Surah: {$hizb['end_surah']}\n";
        echo "Order (Up to Down): {$hizb['order_up_to_down']}\n";
        echo "Order (Down to Top): {$hizb['order_down_to_top']}\n";
        echo "Description: {$hizb['description']}\n\n";
    }

    // Get hizb by order (up-to-down)
    echo "=== Get Hizb by Order Up-to-Down (1) ===\n";
    $hizbByOrder = HisbProvider::getHizbByOrderUpToDown(1);
    if ($hizbByOrder) {
        echo "Name: {$hizbByOrder['name']}\n";
        echo "Start Ayah: {$hizbByOrder['start_ayah']}\n\n";
    }

    // Get hizb by order (down-to-top)
    echo "=== Get Hizb by Order Down-to-Top (1) ===\n";
    $hizbByOrderDown = HisbProvider::getHizbByOrderDownToTop(1);
    if ($hizbByOrderDown) {
        echo "Name: {$hizbByOrderDown['name']}\n";
        echo "Start Surah: {$hizbByOrderDown['start_surah']}\n\n";
    }

    // Search hizbs by name
    echo "=== Search Hizbs by Name (containing 'عمّ') ===\n";
    $searchResults = HisbProvider::searchHizbsByName('عمّ');
    foreach ($searchResults as $result) {
        echo "- {$result['name']} (Order: {$result['order_up_to_down']})\n";
    }
    echo "\n";

    // Get hizbs by surah
    echo "=== Get Hizbs by Surah (النبأ) ===\n";
    $hizbsBySurah = HisbProvider::getHizbsBySurah('النبأ');
    foreach ($hizbsBySurah as $hizb) {
        echo "- {$hizb['name']} (ID: {$hizb['id']})\n";
    }
    echo "\n";

    // Get hizbs in range
    echo "=== Get Hizbs in Range (1-3) ===\n";
    $hizbsInRange = HisbProvider::getHizbsInRange(1, 3);
    foreach ($hizbsInRange as $hizb) {
        echo "- Order {$hizb['order_up_to_down']}: {$hizb['name']}\n";
    }
    echo "\n";

    // Get a random hizb
    echo "=== Random Hizb ===\n";
    $randomHizb = HisbProvider::getRandomHizb();
    echo "Random hizb: {$randomHizb['name']} (ID: {$randomHizb['id']})\n\n";

    // Validation examples
    echo "=== Validation Examples ===\n";
    echo "Is ID 30 valid? " . (HisbProvider::isValidHizbId(30) ? 'Yes' : 'No') . "\n";
    echo "Is ID 70 valid? " . (HisbProvider::isValidHizbId(70) ? 'Yes' : 'No') . "\n";
    echo "Is order 45 valid? " . (HisbProvider::isValidHizbOrder(45) ? 'Yes' : 'No') . "\n\n";

    // Export to JSON (first 3 hizbs for brevity)
    echo "=== JSON Export (Hizb ID 1) ===\n";
    $jsonOutput = HisbProvider::toJson(1);
    echo $jsonOutput . "\n\n";

    // Export to XML (just showing it works - output would be large)
    echo "=== XML Export (structure only) ===\n";
    $xmlOutput = HisbProvider::toXml();
    echo "XML generated successfully. Length: " . strlen($xmlOutput) . " characters\n";
    // Uncomment the next line to see the full XML output
    // echo $xmlOutput . "\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}