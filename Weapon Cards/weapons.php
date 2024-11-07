<?php
include_once("../connection.php");
include_once("../nav.html");

$weapon_id = $_GET['id'];

// Query to get weapon details from the weapons table
$weapon_query = $conn->query("SELECT * FROM weapons WHERE id=" . $weapon_id);
$weapons = $weapon_query->fetchAll(PDO::FETCH_ASSOC);

// Query to get all weapon popularity values from the weapons_chart table
$total_popularity_query = $conn->query("SELECT WEAPON_POPULARITY FROM weapons_chart");
$total_popularities = $total_popularity_query->fetchAll(PDO::FETCH_ASSOC);

// Calculate total popularity
$total_popularity = 0;
foreach ($total_popularities as $popularity) {
    $total_popularity += $popularity['WEAPON_POPULARITY'];
}

// Get the popularity of the selected weapon
$chart_query = $conn->query("SELECT * FROM weapons_chart WHERE ID=" . $weapon_id);
$chart_details = $chart_query->fetch(PDO::FETCH_ASSOC);

// Calculate the percentage for the selected weapon
$weapon_popularity = $chart_details['WEAPON_POPULARITY'];
$weapon_percentage = ($total_popularity > 0) ? ($weapon_popularity / $total_popularity) * 100 : 0;
$other_percentage = 100 - $weapon_percentage;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weapon Details</title>
    <link rel="stylesheet" href="weapons.css">
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Additional CSS for positioning and styling */
        .content-container {
            padding: 20px;
            color: aliceblue;
            font-size: 25px;
            margin-bottom: 0px;
            margin-top: 0px;
        }

        .descript {
            margin-bottom: 20px;
        }

        .weapon-chart {
            position: relative;
            margin-top: 30px;
            height: 300px;
        }

        /* Position the chart in the bottom-right corner */
        @media (max-width: 768px) {
            .weapon-chart {
                width: 50%; /* Adjust the width on smaller screens */
                position: absolute;
                bottom: 20px;
                right: 20px;
            }
        }

        /* Make chart fit nicely on larger screens */
        @media (min-width: 769px) {
            .weapon-chart {
                width: 300px; /* Fixed size for medium and larger screens */
                margin-left: auto;
                margin-right: auto;
            }
        }
    </style>
</head>
<body>
<div class="content-container">
    <?php if (!empty($weapons)) {
        $weapon = $weapons[0]; // Since only one weapon detail is expected based on the ID
    ?>
        <h1 id="title"><?= htmlspecialchars($weapon['name']) ?></h1>

        <div class="index-left">
            <img src="../Images/Weapons/<?= htmlspecialchars($weapon['name']) ?>.webp"
                 onerror="this.onerror=null; this.src='../Images/Monster Icons/Default_Icon.webp';"
                 class="cover-image"
                 alt="<?= htmlspecialchars($weapon['name']) ?>" />
        </div>

        <div class="descript">
            <h2>Details:</h2>
            <p><?= htmlspecialchars($weapon["info"]) ?></p>
        </div>

        <?php if ($chart_details) { ?>
            <!-- Donut Chart Section (Moved below description) -->
            <div class="weapon-chart">
                <h3>Weapon Popularity Chart: <?= htmlspecialchars($weapon['name']) ?></h3>
                <canvas id="weaponChart" width="400" height="400"></canvas>
                <script>
                    // Get weapon data from PHP
                    var weaponPopularity = <?= $weapon_percentage ?>;
                    var otherPopularity = <?= $other_percentage ?>;
                    var weaponName = "<?= htmlspecialchars($weapon['name']) ?>";

                    // Donut chart data
                    var chartData = {
                        labels: [weaponName, "Other Weapons"], // Customize labels here
                        datasets: [{
                            data: [weaponPopularity, otherPopularity], // Data representing weapon popularity vs other weapons
                            backgroundColor: ["#FFEB3B", "#272B3B"], // Colors for the donut sections
                            hoverBackgroundColor: ["#FFEB3B", "#272B3B"]
                        }]
                    };

                    // Donut chart options with style enhancements
                    var chartOptions = {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    font: {
                                        size: 16,
                                        weight: 'bold'
                                    }
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ": " + tooltipItem.raw.toFixed(2) + "%";
                                    }
                                }
                            }
                        },
                        elements: {
                            arc: {
                                borderWidth: 5 // Set border width for each section
                            }
                        }
                    };

                    // Create the chart
                    var ctx = document.getElementById('weaponChart').getContext('2d');
                    var weaponChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: chartData,
                        options: chartOptions
                    });
                </script>
            </div>

        <?php } else { ?>
            <p>No chart details available for this weapon.</p>
        <?php } ?>

    <?php } else { ?>
        <p>Weapon not found.</p>
    <?php } ?>
</div>
</body>
</html>
