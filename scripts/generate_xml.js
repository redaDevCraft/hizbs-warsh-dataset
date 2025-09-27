const fs = require('fs');
const path = require('path');
const hizbs = require('../data/hizbs.json');

function generateHizbsXML(data) {
    return `<hizbs>
${data.hizbs.map(h => `    <hizb>
        <id>${h.id}</id>
        <name>${h.name}</name>
        <start_surah>${h.start_surah}</start_surah>
        <start_ayah>${h.start_ayah}</start_ayah>
        <end_surah>${h.end_surah}</end_surah>
        <end_ayah>${h.end_ayah}</end_ayah>
        <order_up_to_down>${h.order_up_to_down}</order_up_to_down>
        <order_down_to_top>${h.order_down_to_top}</order_down_to_top>
        <description>${h.description}</description>
    </hizb>`).join('\n')}
</hizbs>`;
}

const defaultOutputPath = path.join(__dirname, '..', 'output', 'hizbs.xml');

const exportMode = process.argv.includes('--export');
const dataOutputPath = path.join(__dirname, '..', 'data', 'hizbs.xml');

const xmlContent = generateHizbsXML(hizbs);

fs.mkdirSync(path.join(__dirname, '..', 'output'), { recursive: true });
fs.writeFileSync(defaultOutputPath, xmlContent);

console.log(`XML file generated at ${defaultOutputPath}`);

if (exportMode) {
    fs.writeFileSync(dataOutputPath, xmlContent);
    console.log(`XML file exported to ${dataOutputPath}`);
}
