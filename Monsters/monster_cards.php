<?php
include("../connection.php");

$query = $conn->query("SELECT * FROM `monsters`");
$monsters = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Card</title>
    <link rel="stylesheet" href="monster_cards.css">
</head>

<body>

    <h1 class="title1">Small Monsters</h1>
    <div class="card-list">
    <?php foreach ($monsters as $index => $monster) {
        if ($monster['small_monster'] == 1) {?>
        <div class="card">
            <div class="wrapper">
                <img src="../Images/Monster Icons/<?=str_replace(" ", "_", $monster['name'])?>_Icon.webp" class="cover-image" alt="<?=$monster['name']?>" />
            </div>
            <div class="title"><?=$monster['name'];?></div>
            <img src="../Images/Monster Renders/<?=str_replace(" ", "_", $monster['name'])?>_Render.webp" class="character" alt="Bow Character" />
        </div>
    <?php }}?>
    </div>

    
    
    <h1 class="title1">Large Monsters</h1>
    <div class="card-list1">

        <?php foreach ($monsters as $index => $monster) {
            if ($monster['small_monster'] == 0) {?>
            <div class="card">
                <div class="wrapper">
                    <img src="../Images/Monster Icons/<?=str_replace(" ", "_", $monster['name'])?>_Icon.webp" class="cover-image" alt="Bow Cover" />
                </div>
                <div class="title"><?=$monster['name'];?></div>
                <img src="../Images/Monster Renders/<?=str_replace(" ", "_", $monster['name'])?>_Render.webp" class="character" alt="Bow Character" />
            </div>
            <?php }}?>
            </div>
</body>

</html>