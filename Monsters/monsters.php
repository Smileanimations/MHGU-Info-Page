<?php

include_once("../connection.php");

$query = $conn->query("SELECT * FROM `monsters` WHERE id=" . $_GET['id']);
$monsters = $query->fetchAll(PDO::FETCH_ASSOC);
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
<a href="monster_cards.php">&crarr;Back</a>
    <?php foreach ($monsters as $index => $monster) { ?>
        <div class="title">
            <img src="../Images/Monster Icons/<?=str_replace(" ", "_", $monster['name'])?>_Icon.webp" onerror="this.onerror=null; this.src='../Images/Monster Icons/Default_Icon.webp';" class="cover-image" alt="<?=$monster['name']?>" />
            <div class="header">
                <h1><?=$monster['name']?></h1>
                <h3><?=$monster['type']?></h3>
            </div>
        </div>
        
    <?php }?>
</body>
</html>