// Test CSV-data direct in de JavaScript (om fetch-problemen te omzeilen)
const csvData = `
ID,WEAPON_CLASS,WEAPON_POPULARITY
1,Greatsword,13867
2,Longsword,9800
3,Sword and Shield,9124
4,Dual Blades,10821
5,Hammer,3403
6,Hunting Horn,2178
7,Lance,1832
8,Gunlance,1362
9,Switchaxe,7762
10,Charge Blade,11187
11,Insect Glaive,11821
12,Light Bowgun,4919
13,Heavy Bowgun,2058
14,Bow,4076
15,Prowler,5573
`;

// Functie om CSV te parsen
function parseCSV(data) {
    const lines = data.trim().split('\n');
    const headers = lines[0].split(',');
    return lines.slice(1).map(line => {
        const values = line.split(',');
        let entry = {};
        headers.forEach((header, index) => {
            entry[header.trim()] = values[index].trim();
        });
        return entry;
    });
}

// Functie om de donut charts te genereren
function createDonutChart(weaponClass, weaponPopularity, totalPopularity) {
    const percentage = ((weaponPopularity / totalPopularity) * 100).toFixed(1);
    const remainingPercentage = (100 - percentage).toFixed(1);

    const svgItem = `
        <div class="svg-item">
                <p style="text-align: center;">${weaponClass}</p>
            <svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
                <circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#191c29"></circle>
                <circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
                <circle class="donut-segment" cx="20" cy="20" r="15.91549430918954" fill="transparent"
                    stroke-width="3.5" stroke-dasharray="${percentage} ${remainingPercentage}" stroke-dashoffset="25"></circle>
                <g class="donut-text">
                    <text y="50%" transform="translate(0, 2)">
                        <tspan x="50%" text-anchor="middle" class="donut-percent">${percentage}%</tspan>
                    </text>
                    <text y="60%" transform="translate(0, 2)">
                        <tspan x="50%" text-anchor="middle" class="donut-data">${weaponPopularity} Weapon Usage</tspan>
                    </text>
                </g>
            </svg>
        </div>`;

    return svgItem;
}

// Functie om alle charts te genereren
function generateCharts() {
    const data = parseCSV(csvData);
    const totalPopularity = data.reduce((sum, weapon) => sum + parseInt(weapon.WEAPON_POPULARITY), 0);
    const chartContainer = document.getElementById('chart-container');

    data.forEach(weapon => {
        const weaponClass = weapon.WEAPON_CLASS;
        const weaponPopularity = parseInt(weapon.WEAPON_POPULARITY);
        const chart = createDonutChart(weaponClass, weaponPopularity, totalPopularity);
        chartContainer.innerHTML += chart;
    });
}

// Start de chart generatie
generateCharts();
