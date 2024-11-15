<?php
#ambil get message jika ada
$errorMessage = @$_GET["error"];
#memulai session
session_start();
#ambil status aksessnya
$akses = @$_SESSION["akses"];

#cek akses apakah sudah login
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="https://amikom.ac.id/theme/material/img/amikom_icon_pack/favicon-16x16.png"
        type="image/x-icon">
    <link rel="stylesheet" href="O.css">
</head>
<body>
    <div class="login-container">
        <div class="title">
            <h1>Admin Login</h1>
        </div>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label>Masukan Email</label>
                <input type="text" name="username">
            </div>
            <div class="form-group">
                <label>Masukan Password</label>
                <input type="password" name="password">
            </div>
            <button class="B" type="submit">
                Sign In
            </button>
        </form>
        <a class="a" href="index2.php">Don't have an account? Register!!!</a>
    </div>
</body>
</html>
