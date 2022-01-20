<?php
require 'functions.php';
if (isset($_POST['sign-up'])) {
    if (signUp($_POST) > 0) {
        echo  " <script>
                    alert('Data User Baru telah tersimpan')
                </script>";
    } else {
        echo mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body>
    <h1>Sign Up</h1>

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
                <label for="confirm-password">Confirm Password :</label>
                <input type="password" name="confirm-password" id="confirm-password" required>
            </li>
            <br>
            <li>
                <button type="submit" name="sign-up">Sign Up</button>
            </li>
        </ul>
    </form>
</body>

</html>