<?php

include_once("../connection.php");
include_once("../nav.html");

$query = $conn->query("SELECT * FROM `monsters` WHERE id=" . $_GET['id']);
$monsters = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $conn->query("SELECT l.name AS locale, l.id AS locale_id FROM `monsters` m JOIN monster_locales ml ON m.id = ml.monster_id JOIN locales l ON l.id = ml.locale_id WHERE m.id=" . $_GET['id']);
$locales = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="monsters.css">
</head>
<body>
    <?php foreach ($monsters as $index => $monster) { ?>
        <div class="title">
            <img src="../Images/Monster Icons/<?=str_replace(" ", "_", $monster['name'])?>_Icon.webp" onerror="this.onerror=null; this.src='../Images/Monster Icons/Default_Icon.webp';" class="cover-image" alt="<?=$monster['name']?>" />
            <div class="header">
                <h1><?=$monster['name']?></h1>
                <h3><?=$monster['type']?></h3>
            </div>
        </div>
        <div class="index">
            <img src="../Images/Monster Renders/<?= str_replace(" ", "_", $monster['name'])?>_Render.webp" alt="" class="render">
            <div class="loser">
                <i class="description">"<?= $monster['description']?>"</i>
            </div>
        </div>
        <div>
            <?php foreach ($locales as $index => $locale) {?>
                <div>
                    <h2><?=$locale['locale']?></h2>
                    <img src="../Images/Locale Maps/<?= str_replace(" ", "_", $locale['locale'])?>" alt="">
                </div>
            <?php }?>
        </div>
    <?php }?>
</body>
</html>