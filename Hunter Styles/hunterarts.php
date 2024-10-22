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
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- <div>
        <?php foreach ($arts as $index => $art) { ?>
            <h1><?= $art["name"] ?></h1>
        <?php }?>
    </div> -->
    <h1 class="title" style="color: black;">Hunter Arts</h1>
    <div>
      <table>
        <thead>
          <tr>
            <th>Visual</th>
            <th>Name</th>
            <th>Description</th>
            <!-- <th>Details</th> -->
          </tr>
        </thead>
        <?php foreach ($arts as $index => $art) { ?>
          <tr>
            <td><img src="../Images/Weapons/Arts/<?php echo $art['name']?>.png" alt="" class="icons"></td>
            <td><?= $art["name"] ?></td>
            <td><?= $art["info"] ?></td>
            <!-- <td><a href="details.php?id=<?= $art["id"] ?>">View details</a></td> -->
          </tr>
        <?php } ?>
      </table>
    </div>
</body>
</html>
