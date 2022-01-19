<?php
session_start();

// if user not login, redirect to login page
if (!isset($_SESSION["isLogin"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// set pagination
$dataPerHalaman = 2;
$totalData = count(query("SELECT * FROM siswa"));
$totalPage = ceil($totalData / $dataPerHalaman);
$activePage = (isset($_GET["page"])) ? $_GET["page"] : 1;
$awalData = ($dataPerHalaman * $activePage) - $dataPerHalaman;

$siswa = query("SELECT * FROM siswa LIMIT $awalData, $dataPerHalaman");
// Search Button clicked
if (isset($_POST["search"])) {
    $siswa = cari($_POST['keyword']);
}
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

    <a href="logout.php">Log Out</a>

    <br>
    <br>

    <a href="tambah.php">Tambah Data Siswa</a>
    <br>
    <br>

    <form action="" method="post">
        <label for="keyword">Cari Data Siswa :</label>
        <input type="search" name="keyword" id="keyword" size="30" placeholder="Cari Data Siswa..." autofocus autocomplete="off">
        <button type="submit" name="search">Cari</button>
    </form>
    <br>

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

        <?php $i = 1 + $awalData; ?>
        <?php foreach ($siswa as $row) : ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <img src="assets/<?= $row["gambar"]; ?>" alt="<?= $row["nama"] ?>" height="100">
                </td>
                <td><?= $row["nis"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jurusan"]; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                    |
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah anda yakin menghapus data?')">Delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>

    <!-- Navigation -->
    <br>
    <!-- FIRST PAGE -->
    <?php if ($activePage != 1) : ?>
        <a href="?page=1">FIRST</a>
    <?php endif ?>

    <?php if ($activePage > 1) : ?>
        <a href="?page=<?= $activePage - 1 ?>">&laquo;</a>
    <?php endif ?>

    <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
        <?php if ($i == $activePage) : ?>
            <a href="?page=<?= $i ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
        <?php else : ?>
            <a href="?page=<?= $i ?>"><?= $i; ?></a>
        <?php endif ?>
    <?php endfor ?>

    <?php if ($activePage < $totalPage) : ?>
        <a href="?page=<?= $activePage + 1 ?>">&raquo;</a>
    <?php endif ?>

    <!-- LAST PAGE -->
    <?php if ($activePage != $totalPage) : ?>
        <a href="?page=<?= $totalPage ?>">LAST</a>
    <?php endif ?>

</body>

</html>