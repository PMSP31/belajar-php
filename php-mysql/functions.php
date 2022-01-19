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

    // Upload image
    $gambar = upload();
    if (!$gambar) {
        return false;
    };

    // query insert data
    $query =    "INSERT INTO siswa 
                    VALUES 
                (null,'$nama','$nis','$email','$jurusan','$gambar')";
    mysqli_query($db, $query);

    // give return
    return mysqli_affected_rows($db);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // checking if user not uploading file
    if ($error === 4) {
        echo "<script>
                alert('Anda tidak mengupload gambar!');
              </script>";
        return false;
    }

    // check extension of file
    $extFile = ['jpg', 'jpeg', 'png'];
    $format = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    // check upload extension in array
    if (!in_array($format, $extFile)) {
        echo "<script>
                alert('Kesalahan ekstensi gambar!!');
              </script>";
        return false;
    }

    // check size file
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar! (maks 1 MB)');
              </script>";
        return false;
    }

    // generate new file name
    $newNameFile = uniqid();
    $newNameFile .= ".";
    $newNameFile .= $format;

    // move uploaded file
    if (!move_uploaded_file($tmpName, "assets/$newNameFile")) {
        return false;
    }

    return $newNameFile;
}

function hapus($id)
{
    global $db;
    // remove image from assets
    $result = mysqli_query($db, "SELECT gambar FROM siswa WHERE id = $id");
    $file = mysqli_fetch_assoc($result);

    $fileName = implode('.', $file);
    $location = "assets/$fileName";
    if (file_exists($location)) {
        unlink("assets/" . $fileName);
    }
    // remove on DB
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
    $gambarLama = htmlspecialchars($data['oldImage']);

    // check if user set new Image
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        // remove image from assets, change new image
        $result = mysqli_query($db, "SELECT gambar FROM siswa WHERE id = $id");
        $file = mysqli_fetch_assoc($result);

        $fileName = implode('.', $file);
        unlink("assets/" . $fileName);

        // upload new image
        $gambar = upload();
    }

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

function cari($keyword)
{
    $query = "SELECT * FROM siswa 
                WHERE
                nama LIKE '%$keyword%' OR
                nis LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'";
    return query($query);
}

function signUp($data)
{
    global $db;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($db, $data['password']);
    $confirmPassword = mysqli_real_escape_string($db, $data['confirm-password']);

    // check empty username
    if (empty(trim($username))) {
        return false;
    }

    // check duplicate user
    $result = mysqli_query($db, "SELECT username FROM user WHERE username = '$username' ");
    if (mysqli_fetch_assoc($result)) {
        echo  " <script>
                    alert('Username sudah terdaftar!!')
                </script>";
        return false;
    }

    // check confirm password
    if ($password !== $confirmPassword) {
        echo  " <script>
                    alert('Password yang anda masukan tidak sama!!')
                </script>";
        return false;
    }

    // encryption password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // add new user to DB
    mysqli_query($db, "INSERT INTO user VALUES(null, '$username','$password')");

    return mysqli_affected_rows($db);
}
