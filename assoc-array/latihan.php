<?php
// Assocative Array
// Array yang key-nya menggunakan string yang kita buat sendiri
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
        <style>
            div {
                display: flex;
            }

            ul {
                list-style: none;
            }
        </style>
    </head>

    <body>
        <div>
            <?php foreach ($cars as $car) : ?>
                <ul>
                    <li>
                        <img src="img/<?= $car["image"] ?>" alt="<?php $car["image"] ?>">
                    </li>
                    <li>Car Name : <?= $car["name"] ?></li>
                    <li>Brand : <?= $car["brand"] ?></li>
                    <li>Color : <?= $car["color"] ?></li>
                    <li>Year : <?= $car["year"] ?></li>
                </ul>
            <?php endforeach ?>
        </div>
    </body>

    </html>