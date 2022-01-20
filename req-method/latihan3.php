<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>

<body>
    <?php if (isset($_POST["submit"])) : ?>
        <h1>Welcome, <?= $_POST["name"] ?></h1>
    <?php endif ?>
    <form action="" method="post">
        <label for="name">Input Name :</label>
        <input type="text" name="name">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>