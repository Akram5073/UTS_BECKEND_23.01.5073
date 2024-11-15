<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="shortcut icon" href="https://amikom.ac.id/theme/material/img/amikom_icon_pack/favicon-16x16.png"
        type="image/x-icon">
    <link rel="stylesheet" href="reg.css">
</head>
<body>
    <div class="login-container">
        <div class="title">
            <h1>Form Register</h1>
        </div>
        <form action="regis.php" method="POST">
            <div class="form-group">
                <label>Masukan Nama</label>
                <input type="text" name="name">
            <div class="form-group">
                <label>Masukan Username</label>
                <input type="text" name="username">
            </div>
            <div class="form-group">
                <label>Masukan Password</label>
                <input type="password" name="password">
            </div>
            <button type="submit">
                <a>Sign In</a>
            </button>
        </form>
        <a href="index.php">Have account? Login!!!</a>
    </div>
</body>
</html>