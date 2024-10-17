<?php
include_once("../connection.php");
include_once("../nav.html");

$query = $conn->query("SELECT * FROM `hunter arts`");
$weapons = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hunter Arts</title>
</head>
<body>
    <a>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod optio sed iste facilis libero, non odit necessitatibus? Neque repellendus esse expedita sapiente voluptates voluptate voluptas deserunt maiores nostrum perspiciatis? Sequi!</a>
</body>
</html>
