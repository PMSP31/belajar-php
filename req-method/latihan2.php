<?php
// cek data $_GET
$name = $_GET["name"];
$brand = $_GET["brand"];
$color = $_GET["color"];
$year = $_GET["year"];
$image = $_GET["image"];

if (
    !isset($name) ||
    !isset($brand) ||
    !isset($color) ||
    !isset($year) ||
    !isset($image)
) {
    // redirect
    header("Location: latihan.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail <?= $name ?></title>
</head>

<body>
    <ul>
        <!-- <li><img src="img/<?= $_GET["image"] ?>" alt="<?= $_GET["name"] ?>"></li>
        <li>Name : <?= $_GET["name"] ?></li>
        <li>Brand : <?= $_GET["brand"] ?></li>
        <li>Color : <?= $_GET["color"] ?></li>
        <li>Year : <?= $_GET["year"] ?></li> -->

        <!-- versi singkat -->
        <li><img src="img/<?= $image ?>" alt="<?= $name ?>"></li>
        <li>Name : <?= $name ?></li>
        <li>Brand : <?= $brand ?></li>
        <li>Color : <?= $color ?></li>
        <li>Year : <?= $year ?></li>
    </ul>
    <a href="latihan2.php">Back</a>
</body>

</html>