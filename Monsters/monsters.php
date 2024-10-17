<?php

include_once("../connection.php");

$icon;
$query = $conn->query("SELECT * FROM `monsters`");
$monsters = $query->fetchAll(PDO::FETCH_ASSOC);

$red = "red";
$green = "green"
?>

<style>
img {
    display: block;
    max-width: 700px;
    max-height:525px;
    width: auto;
    height: auto;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="monster_cards.php">&crarr;Back</a>
    <?php foreach ($monsters as $index => $monster) {
        ?>
        <div style="border: 10px solid black; position: relative">
            <img src="Images/Monster Icons/<?= str_replace(" ", "_", $monster['name'])?>_Icon.webp" onerror="this.onerror=null; this.src='../Images/Monster Icons/Default_Icon.webp';" alt=<?= $monster['name'];?>>
            <h2 style="color:<?php if ($monster['deviant'] == 1){echo "red";} elseif ($monster['type'] == "Elder Dragon"){echo $green;}?>"><?=$monster['name'];?></h2>
            <h3><?=$monster['type'];?></h3>
            <p><?= $monster['description'];?></p>
            <img src="images/Monster Renders/<?= str_replace(" ", "_", $monster['name'])?>_Render.webp" alt="">
            <div>
                <?php if (isset($monster['related_monsters'])) {
                $related_monsters = explode(", ", $monster['related_monsters']);?>
                <h4>Related Monsters</h4>
                <?php foreach ($related_monsters as $key => $related_monster) {?>
                    <img src="Images/Monster Icons/<?= str_replace(" ", "_", $related_monster)?>_Icon.webp" onerror="this.onerror=null; this.src='Images/Monster Icons/Default_Icon.webp';" alt="">
                    <p><?= $related_monster?></p>
                <?php }}?>
            </div>
        </div>
    <?php }?>
</body>
</html>