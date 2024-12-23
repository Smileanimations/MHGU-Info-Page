<?php
include_once("../connection.php");
include_once("../nav.html");

$query = $conn->query("SELECT * FROM `weapons`");
$weapons = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Card</title>
    <link rel="stylesheet" href="card.css">
</head>

<body>
    <ul class="card-list">
        <?php foreach ($weapons as $index => $weapon) { ?>
            <div class="card">
                <div class="wrapper">
                    <img src="../Images/Weapons/Weapon Renders/<?= $weapon['name']?>.webp" class="cover-image" alt="Bow Cover"/>
                </div>
                <p><?= $weapon['name']?></p>
                <a href="weapons.php?id=<?= $weapon['id']?>"><img src="../Images/Weapons/<?= $weapon['name']?>.webp" class="character" alt="Bow Character"/></a>
            </div>
        <?php }?>
    </ul>
</body>

</html>
