<?php
include_once("../connection.php");
include_once("../nav.html");

$query = $conn->query("SELECT * FROM `hunter arts`");
$arts = $query->fetchAll(PDO::FETCH_ASSOC);

// The following code does not echo var, because it is not NULL. If its given value is changed to NULL, it will print.
// $var = 2;
// if (is_null($var) == true) {
//   echo "thing";
// }
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
    <h1 class="title" style="color: black;">Hunter Arts</h1>
    <div>
      <table>
        <thead>
          <tr>
            <!-- <th>Visual</th> -->
            <th>Name</th>
            <th>Description</th>
            <th>Example</th>
          </tr>
        </thead>
        <?php foreach ($arts as $index => $art) { ?> 
          <?php if (is_null($art['weapon']) == true) { ?>
          <tr>
            <td><?php if (is_null($art['weapon']) == true) {
              print $art["name"]; } ?></td>
            <td><?php if (is_null($art['weapon']) == true) {
              print $art["info"]; } ?></td>
            <td><?php if (is_null($art['weapon']) == true) {
            ?><img src="../Images/Weapons/Arts<?php echo $art['name']?>.png" alt="profile" class="image"><?php } ?></td>
          </tr>
          <?php } ?>
        <?php } ?>
      </table>
    </div>
</body>
</html>
