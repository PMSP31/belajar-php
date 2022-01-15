<?php
$cars = [
    [
        "name" => "Civic Type-R",
        "brand" => "Honda",
        "color" => "White",
        "year" => "2021",
        "image" => "civic-r.png"
    ],
    [
        "name" => "C-200",
        "brand" => "Mercedes-Benz",
        "color" => "Black",
        "year" => "2018",
        "image" => "c-200.png"
    ],
    [
        "name" => "GR Yaris",
        "brand" => "Toyota",
        "color" => "Red",
        "year" => "2021",
        "image" => "gr-yaris.png"
    ],
    [
        "name" => "Swift",
        "brand" => "Suzuki",
        "color" => "Red",
        "year" => "2015",
        "image" => "swift.png"
    ],
    [
        "name" => "Lancer Evolution X",
        "brand" => "Mitsubishi",
        "color" => "Black",
        "year" => "2016",
        "image" => "lancer-evo.png"
    ],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mobil</title>
</head>

<body>
    <h1>Data Mobil</h1>
    <ul>
        <?php foreach ($cars as $car) : ?>
            <li>
                <a href="latihan2.php?name=<?= $car["name"]; ?>&brand=<?= $car["brand"]; ?>&color=<?= $car["color"]; ?>&year=<?= $car["year"]; ?>&image=<?= $car["image"]; ?>"><?= $car["name"]; ?></a>
            </li>
        <?php endforeach ?>
    </ul>

</body>

</html>