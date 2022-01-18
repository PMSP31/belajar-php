<?php
// Connection to DB
$db = mysqli_connect("localhost", "root", '', 'phpdasar');

// Query data from table siswa
$result = mysqli_query($db, 'SELECT * FROM siswa');

// get / fetch data from object $result
/* 
    mysqli_fetch_row() ~ return arr numerik
    mysqli_fetch_assoc() ~ return arr assoc
    mysqli_fetch_array() ~ return all type array, multiple return
    mysqli_fetch_object() ~ return object
*/
/* while ($siswa = mysqli_fetch_assoc($result)) {
    var_dump($siswa);
}; */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body>
    <h1>Daftar Siswa</h1>

    <table border="1" cellpadding="10" cellspacing='0' style="text-align: center;">
        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <img src="assets/<?= $row["gambar"] ?>" alt="" height="100">
                </td>
                <td><?= $row["nis"] ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["jurusan"] ?></td>
                <td>
                    <a href="">Edit</a>
                    <a href="">Delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endwhile; ?>
    </table>
</body>

</html>