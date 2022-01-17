<?php
// Connection to DB
$db = mysqli_connect("localhost", "root", '', 'phpdasar');

function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $db;

    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // query insert data
    $query =    "INSERT INTO siswa 
                    VALUES 
                (null,'$nama','$nis','$email','$jurusan','$gambar')";
    mysqli_query($db, $query);

    // give return
    return mysqli_affected_rows($db);
}

function hapus($id)
{
    global $db;
    mysqli_query($db, "DELETE FROM siswa WHERE id = $id");
    return mysqli_affected_rows($db);
}

function update($data, $id)
{
    global $db;

    // $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // query insert data
    $query =    "UPDATE siswa SET
                    nama = '$nama',
                    nis = '$nis',
                    email = '$email',
                    jurusan = '$jurusan',
                    gambar = '$gambar'
                WHERE id = $id";
    mysqli_query($db, $query);

    // give return
    return mysqli_affected_rows($db);
}
