<?php
session_start();

// if user not login, redirect to login page
if (!isset($_SESSION["isLogin"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$id = $_GET["id"];
if (hapus($id) > 0) {
    echo "<script>
                alert('Berhasil Hapus Data');
                document.location.href = 'index.php'
            </script>";
} else {
    echo "<script>
                alert('Gagal Hapus Data');
                document.location.href = 'index.php'
            </script>";
}
