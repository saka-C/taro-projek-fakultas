<?php 
require 'rl.php';
if (isset($_SESSION['usera'])) {
    header("Location:../admin/dashboard/dashboard.php");
    
} else if (isset($_SESSION['useru'])) {
    header("Location:index.php");
}
else if (isset($_SESSION['usernew'])) {
    header("Location:profile.php");
}
if (isset($_POST['submit'])) {
    regis($_POST); // Memanggil fungsi regis() untuk memproses pendaftaran
}

?>
 
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="logoui.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="login.css">
 
    <title>Daftar Akun</title>
</head>
<body>
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
        <h2>Daftar</h2>
        <form action=""method="POST">
            
            <div class="form-group">               
                <label for="email">email</label>
                <input type="email" id="email" name="email"  required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="min-6 karakter" minlength="6" required>
            </div>
            <div class="form-group">
                <label>confirm password</label>
                <input type="password" id="cpassword" name="cpassword" placeholder="Verifikasi Password" minlength="6" required>
            </div>
            
            <button type="submit" value="submit" name="submit" class="btn"  >Daftar</button>
        </form>
        <p>Sudah punya akun?</p>
        <a href="login.php">Masuk </a>
</body>
</html>