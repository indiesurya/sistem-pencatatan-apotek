<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}
require 'functions.php';
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            //set session login
            $_SESSION["user"] = $row;
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
    <title>Apotek Kubu Anyar</title>
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>

<body>
    <div class="card">
        <form action="" method="POST">
                <?php if (isset($error)) : ?>
                    <p>username/password salah</p>
                <?php endif; ?>
                    <label for="username">Login</label>
                    <input type="text" name="username" placeholder="Username ..." autocomplete="off">
                    <input type="password" name="password" placeholder="Password ..." autocomplete="off">
                <p>
                    <button type="submit" name="login">Login</button>
                </p>
                <a href="registrasi.php" style="color: white; float:right; margin-right :64px; font-size:12px;">tidak punya akun?</a>
        </form>
    </div>
</body>

</html>