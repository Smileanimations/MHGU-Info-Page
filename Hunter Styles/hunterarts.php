<?php
include_once("../connection.php");
include_once("../nav.html");

$query = $conn->query("SELECT * FROM `hunter arts`");
$arts = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hunter Arts</title>
</head>
<body>
<?php foreach ($arts as $index => $art) { ?>
    <h1><?= $art["name"] ?></h1>
<?php }?>
</body>
</html>
