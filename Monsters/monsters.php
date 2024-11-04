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
                <h1 id="title"><?=$monster['name']?></h1>
                <h3 id="type"><?=$monster['type']?></h3>
            </div>
        </div>
        <div class="index">
            <img src="../Images/Monster Renders/<?= str_replace(" ", "_", $monster['name'])?>_Render.webp" alt="" class="render">
            <div class="index-left">  
                <div class="descriptiondiv">
                    <i class="description">"<?= $monster['description']?>"</i>
                </div>
                <div class="relatedmonsterparent">
                    <?php if (!empty($monster['related_monsters'])) {?>
                    <h2>Related Monsters:</h2>
                <?php
                $related_monsters = explode(", ", $monster['related_monsters']);
                foreach ($related_monsters as $related_monster) {
                $query = $conn->query("SELECT id FROM monsters WHERE name = '" . $related_monster . "'");
                $monsterlink = $query->fetchAll(PDO::FETCH_ASSOC);?>
                    <div class="relatedmonster">
                        <a href="monsters.php?id=<?php foreach ($monsterlink as $index => $monster) {echo $monster['id'];}?>"><img src="../Images/Monster Icons/<?= str_replace(" ", "_", $related_monster)?>_Icon.webp" onerror="this.onerror=null; this.src='../Images/Monster Icons/Default_Icon.webp';" alt=""></a>
                        <p><?= $related_monster?></p>
                    </div>
                <?php }}?>
                </div>
            </div>  
        </div>
        <div class="localeparent">
            <?php foreach ($locales as $index => $locale) {?>
                <div class="localediv">
                    <h2 id="locale"><?=$locale['locale']?></h2>
                    <img src="../Images/Locale Maps/<?= str_replace(" ", "_", $locale['locale'])?>.webp" alt="" class="locales">
                </div>
            <?php }?>
        </div>
    <?php }?>
</body>
</html>