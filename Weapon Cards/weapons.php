<?php
include_once("../connection.php");

$icon;
$query = $conn->query("SELECT * FROM weapons WHERE id=" . $_GET['id']);
$weapons = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weapon details</title>
    <style>
        h1 {text-align: center !important; color: white; font-size: 32px; background-color: #111828; width: 275px; margin: auto !important;}
        body {background-color: #111828;}
        p {text-align: center; color: white; font-size: larger;}
        .cover-image {  display: block; margin-left: auto; margin-right: auto; width: 30%;}
        .descript {text-align: left; font-size: small; border: 1px solid yellow; display: block; margin-left: auto; margin-right: auto;}
    </style>
</head>
<body>
<a href="card.php">&crarr;Back</a>
<ul class="card-list">
    <?php foreach ($weapons as $index => $weapon) { ?>
        <h1><?= $weapon["name"] ?></h1>
    <br>
        <div class="card">
            <div class="wrapper">
                <?php foreach ($weapons as $index => $weapon) { ?>
                    <img src="../Images/Weapons/<?= $weapon['name']?>.webp" onerror="this.onerror=null; this.src='../Images/Monster Icons/Default_Icon.webp';" class="cover-image" alt="<?=$weapon['name']?>" />
                <?php } ?>
            </div>
        </div>
    <?php }?>
    <p>Details:</p>
        <div class="descript">
            <?php foreach ($weapons as $index => $weapon) { ?>
            <p><?= $weapon["info"] ?></p>
            <?php } ?>
        </div>
</body>
</html>