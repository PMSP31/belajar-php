<?php
require '../functions.php';
$keyword = $_GET["keyword"];
$query = "  SELECT * FROM siswa 
                WHERE
            nama LIKE '%$keyword%' OR
            nis LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'";
$siswa = query($query);
?>

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

    <?php $i = 1 ?>
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