<?php

include_once("../connection.php");
include_once("../nav.html");

$query = $conn->query("SELECT * FROM `locales`");
$locales = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locales</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="localeparent">
        <?php foreach ($locales as $index => $locale) { ?>
            <div class="localediv">
                <h2 id="locale"><?= htmlspecialchars($locale['name']) ?></h2> <!-- HTML special chars veilig weergeven -->
                <img src="../Images/Locale Maps/<?= htmlspecialchars(str_replace(" ", "_", $locale['name'])) ?>.webp" alt="<?= htmlspecialchars($locale['name']) ?> map" class="locales">
            </div>
        <?php } ?>
    </div>
</body>
</html>
