<?php
require 'functions.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // check username in DB
    $result = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        // cek password 
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <h1>Login</h1>

    <?php if (isset($error)) : ?>
        <span style="color: red;">Username / Password Salah!!</span>
    <?php endif ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" required>
            </li>
            <br>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required>
            </li>
            <br>
            <li>
                <button type="submit" name="login">Sign Up</button>
            </li>
        </ul>
    </form>
</body>

</html>