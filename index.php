<?php

$files = scandir("Images/Weapons/");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php foreach ($files as $file) {?>
        <p><?=$file;?></p>
        <img src="Images/Weapons/<?=$file;?>" alt="" class="img">
    <?php }?>
</body>
</html>