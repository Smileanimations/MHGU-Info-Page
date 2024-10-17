<?php
include_once("../connection.php");

$icon;
$query = $conn->query("SELECT * FROM `weapons`");
$weapons = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weapon details</title>
</head>
<body>
    <a href="card.php">&crarr;Back</a>
    <ul class="card-list">
        <?php foreach ($weapons as $index => $weapon) { ?>
            <div class="card">
                <div class="wrapper">
                    <img src="../Images/Weapons/Weapon Renders/<?= $weapon['name']?>.webp" onerror="this.onerror=null; this.src='../Images/Monster Icons/Default_Icon.webp';" class="cover-image" alt="<?=$weapon['name']?>" />
                </div>
            </div>
        <?php }?>
    </ul>
</body>
</html>