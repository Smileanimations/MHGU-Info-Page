<?php
include_once("../connection.php");
include_once("../nav.html");

$query = $conn->query("SELECT * FROM weapons WHERE id=" . $_GET['id']);
$weapons = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weapon Details</title>
    <link rel="stylesheet" href="weapons.css">
</head>
<body>
<div class="content-container">
    <?php if (!empty($weapons)) {
        $weapon = $weapons[0]; // Since only one weapon detail is expected based on the ID
    ?>
        <h1><?= htmlspecialchars($weapon["name"]) ?></h1>

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
    <?php } else { ?>
        <p>Weapon not found.</p>
    <?php } ?>
</div>
</body>
</html>
