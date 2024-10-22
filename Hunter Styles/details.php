<?php
include_once("../connection.php");
include_once("../nav.html");

$id = $_GET["id"] ?? "asc";

$query = $conn->query("SELECT * FROM `hunter arts` WHERE id=$id"); 
$arts = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weapon Arts</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php foreach ($arts as $index => $art) { ?>
        <h1><?= $art["name"] ?></h1>
        <br>
        <p><img src="../Images/Wapons/Arts<?php echo $m['name']?>.png" alt="profile" class="image"></p>
        <br>
    <?php } ?>
        <table>
            <tr>
                <th>Information</th>
                <th>Information</th>
                </tr>
            <?php foreach ($arts as $index => $art) { ?>
            <tr>
                <td>Weapon</td>
                <td><?= $art["weapon"] ?></td>
            </tr>
            <tr>
                <td>Details</td>
                <td><?= $art["info"] ?></td>
            </tr>
            <?php } ?>
        </table>
        <br>
    </div>
</body>
</html>