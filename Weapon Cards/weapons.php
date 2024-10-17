<?php

include_once("connection.php");

$icon;
$query = $conn->query("SELECT * FROM `monsters`");
$monsters = $query->fetchAll(PDO::FETCH_ASSOC);

$red = "red";
$green = "green"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weapons</title>
</head>
<body>
    
</body>
</html>