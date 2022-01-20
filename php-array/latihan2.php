<?php
$siswa = [
    ["Paul Mahardika", "19008532", "Rekayasa Perangkat Lunak", "paul@gmail.com"],
    ["Sarono Putro", "1990853", "Teknik Mesin", 'putro@gmail.com']
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
</head>

<body>
    <h1>Data Siswa</h1>

    <?php foreach ($siswa as $sis) : ?>
        <ul>
            <?php foreach ($sis as $s) : ?>
                <li><?= $s ?></li>
            <?php endforeach ?>
        </ul>
    <?php endforeach ?>
</body>

</html>