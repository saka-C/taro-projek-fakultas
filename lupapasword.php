<?php
session_start();
require 'rl.php';
if (isset($_POST['submit'])) {
    lupapw($_POST); // Memanggil fungsi regis() untuk memproses pendaftaran
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="./asset/logoui.png" type="image/x-icon">
    <link rel="stylesheet" href="login.css">
 
    <title>Cari Akun</title>
</head>
<body>
    <div class="alert alert-warning" role="alert">
    </div>
 
    <div class="login-card">
        <div class="logo">
            <div class="image-text">
                <div class="image">
                    <img src="./asset/logoui.png" alt="">
                </div>
                <div class="text-logo">
                    <span class="name">Fakultas Psikologi</span>
                    <span class="profession">Tim IT Fakultas</span>
                </div>
            </div>
        </div>
        <h2>Cari Akun</h2>
        <form method="post" action="">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
        </div>
            <button type="submit" name="submit" value="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>