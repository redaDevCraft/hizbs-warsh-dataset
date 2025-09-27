const { 
    hizbs, 
    getHizbById, 
    getHizbByOrderUp, 
    getHizbByOrderDown, 
    listAll 
} = require('../../index.js');

console.log('=== Hizbs Warsh Dataset - JavaScript Example ===\n');

try {
    // Get total count of hizbs
    const totalHizbs = hizbs.length;
    console.log(`Total number of hizbs: ${totalHizbs}\n`);

    // Get all hizbs using listAll function
    console.log('=== Get All Hizbs ===');
    const allHizbs = listAll();
    console.log(`Retrieved ${allHizbs.length} hizbs using listAll()\n`);

    // Get a specific hizb by ID
    console.log('=== Get Hizb by ID (5) ===');
    const hizb = getHizbById(5);
    if (hizb) {
        console.log(`Name: ${hizb.name}`);
        console.log(`Start Surah: ${hizb.start_surah}`);
        console.log(`End Surah: ${hizb.end_surah}`);
        console.log(`Order (Up to Down): ${hizb.order_up_to_down}`);
        console.log(`Order (Down to Top): ${hizb.order_down_to_top}`);
        console.log(`Description: ${hizb.description}\n`);
    }

    // Get hizb by order (up-to-down)
    console.log('=== Get Hizb by Order Up-to-Down (1) ===');
    const hizbByOrder = getHizbByOrderUp(1);
    if (hizbByOrder) {
        console.log(`Name: ${hizbByOrder.name}`);
        console.log(`Start Ayah: ${hizbByOrder.start_ayah}\n`);
    }

    // Get hizb by order (down-to-top)
    console.log('=== Get Hizb by Order Down-to-Top (1) ===');
    const hizbByOrderDown = getHizbByOrderDown(1);
    if (hizbByOrderDown) {
        console.log(`Name: ${hizbByOrderDown.name}`);
        console.log(`Start Surah: ${hizbByOrderDown.start_surah}\n`);
    }

    // Search examples
    console.log('=== Search Examples ===');
    
    // Find hizbs containing specific text
    const hizbsWithAmma = hizbs.filter(h => h.name.includes('عمّ'));
    console.log(`Hizbs containing 'عمّ':`);
    hizbsWithAmma.forEach(h => {
        console.log(`- ${h.name} (Order: ${h.order_up_to_down})`);
    });

    // Find hizbs by surah
    const hizbsWithNaba = hizbs.filter(h => 
        h.start_surah === 'النبأ' || h.end_surah === 'النبأ'
    );
    console.log(`\nHizbs starting or ending with 'النبأ':`);
    hizbsWithNaba.forEach(h => {
        console.log(`- ${h.name} (ID: ${h.id})`);
    });

    // Get a range of hizbs
    console.log('\n=== Get Hizbs in Range (1-3 by order) ===');
    const hizbsInRange = hizbs
        .filter(h => h.order_up_to_down >= 1 && h.order_up_to_down <= 3)
        .sort((a, b) => a.order_up_to_down - b.order_up_to_down);
    
    hizbsInRange.forEach(h => {
        console.log(`- Order ${h.order_up_to_down}: ${h.name}`);
    });

    // Get a random hizb
    console.log('\n=== Random Hizb ===');
    const randomIndex = Math.floor(Math.random() * hizbs.length);
    const randomHizb = hizbs[randomIndex];
    console.log(`Random hizb: ${randomHizb.name} (ID: ${randomHizb.id})\n`);

    // Validation examples
    console.log('=== Validation Examples ===');
    console.log(`Is there a hizb with ID 30? ${getHizbById(30) ? 'Yes' : 'No'}`);
    console.log(`Is there a hizb with ID 70? ${getHizbById(70) ? 'Yes' : 'No'}`);
    console.log(`Is there a hizb with order 45? ${getHizbByOrderUp(45) ? 'Yes' : 'No'}\n`);

    // Working with data
    console.log('=== Data Analysis Examples ===');
    
    // Count unique surahs
    const startSurahs = [...new Set(hizbs.map(h => h.start_surah))];
    const endSurahs = [...new Set(hizbs.map(h => h.end_surah))];
    console.log(`Unique start surahs: ${startSurahs.length}`);
    console.log(`Unique end surahs: ${endSurahs.length}`);

    // Find the longest hizb name
    const longestName = hizbs.reduce((longest, current) => 
        current.name.length > longest.name.length ? current : longest
    );
    console.log(`Longest hizb name: "${longestName.name}" (${longestName.name.length} characters)`);

    // Export examples
    console.log('\n=== Export Examples ===');
    
    // Export single hizb as JSON
    const singleHizbJson = JSON.stringify(getHizbById(1), null, 2);
    console.log('Single hizb as JSON (first 100 chars):');
    console.log(singleHizbJson.substring(0, 100) + '...\n');

    // Export first 3 hizbs as JSON
    const firstThreeHizbs = hizbs.slice(0, 3);
    const multipleHizbsJson = JSON.stringify(firstThreeHizbs, null, 2);
    console.log('First 3 hizbs JSON size:', multipleHizbsJson.length, 'characters');

    console.log('\n=== Example completed successfully! ===');

} catch (error) {
    console.error('Error:', error.message);
}