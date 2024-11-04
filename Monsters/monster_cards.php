<?php
include("../connection.php");
include_once("../nav.html");

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
<div class="topnav">
  <form method="POST" action="monster_cards.php" type="text" id="input" placeholder="Search..."></form>
</div>
    <h1 class="title1">Small Monsters</h1>
    <div class="card-list">
    <?php foreach ($monsters as $index => $monster) {
        if ($monster['small_monster'] == 1) {?>
        <div class="card">
            <div class="wrapper">
                <img src="../Images/Monster Icons/<?=str_replace(" ", "_", $monster['name'])?>_Icon.webp" onerror="this.onerror=null; this.src='../Images/Monster Icons/Default_Icon.webp';" class="cover-image" alt="<?=$monster['name']?>" />
            </div>
            <div class="title"><?=$monster['name'];?></div>
            <a href="monsters.php?id=<?= $monster['id']?>"><img src="../Images/Monster Renders/<?=str_replace(" ", "_", $monster['name'])?>_Render.webp" class="character" alt="<?= $monster['name'];?>" /></a>
        </div>
    <?php }}?>
    </div>

    <h1 class="title1">Large Monsters</h1>
    <div class="card-list1">

        <?php foreach ($monsters as $index => $monster) {
            if ($monster['small_monster'] == 0) {?>
            <div class="card">
                <div class="wrapper">
                    <img src="../Images/Monster Icons/<?=str_replace(" ", "_", $monster['name'])?>_Icon.webp" onerror="this.onerror=null; this.src='../Images/Monster Icons/Default_Icon.webp';" class="cover-image" alt="Bow Cover" />
                </div>
                <div class="title"><?=$monster['name'];?></div>
                <a href="monsters.php?id=<?= $monster['id']?>"><img src="../Images/Monster Renders/<?=str_replace(" ", "_", $monster['name'])?>_Render.webp" class="character" alt="Bow Character" /></a>
            </div>
            <?php }}?>
    </div>
</body>

</html>