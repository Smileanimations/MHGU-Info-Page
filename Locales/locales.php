<?php

include_once("../connection.php");
include_once("../nav.html");

$query = $conn->query("SELECT * FROM `locales`");
$locales = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="localeparent">
        <?php foreach ($locales as $index => $locale) {?>
            <div class="localediv">
                <h2 id="locale"><?=$locale['name']?></h2>
                <img src="../Images/Locale Maps/<?= str_replace(" ", "_", $locale['name'])?>.webp" alt="" class="locales">
            </div>
        <?php }?>
    </div>
</body>
</html>