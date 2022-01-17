<?php
require 'functions.php';
// get ID
$id = $_GET["id"];
// query data by id
$siswa = query("SELECT * FROM siswa WHERE id = $id")[0];
// cek submit
if (isset($_POST['submit'])) {
    // checking process update to DB
    if (update($_POST, $id) > 0) {
        echo "
            <script>
                alert('Berhasil Update Data');
                document.location.href = 'index.php'
            </script>
        ";
    } else {
        echo "<script>
                alert('Gagal Update Data!');
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Siswa</title>
</head>

<body>
    <h1>Update Data Siswa</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nis">NIS :</label>
                <input type="text" name="nis" id="nis" required value="<?= $siswa["nis"] ?>">
            </li>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" required value="<?= $siswa["nama"] ?>">
            </li>
            <li>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" required value="<?= $siswa["email"] ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan :</label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $siswa["jurusan"] ?>">
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="text" name="gambar" id="gambar" value="<?= $siswa["gambar"] ?>">
            </li>
            <li>
                <button type="submit" name="submit">Kirim Data</button>
            </li>
        </ul>
    </form>
</body>

</html>