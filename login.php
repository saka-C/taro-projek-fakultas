<?php 

 
session_start(); 

require 'rl.php';
 
error_reporting(0);
 
if (isset($_SESSION['usera'])) {
    header("Location:dashboard.php");
    
} else if (isset($_SESSION['useru'])) {
    header("Location:index.php");
}
else if (isset($_SESSION['usernew'])) {
    header("Location:profile.php");
}

if (isset($_POST['submit'])) {
    login($_POST); // Memanggil fungsi regis() untuk memproses pendaftaran
}


 

?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="logoui.png" type="image/x-icon">
    <link rel="stylesheet" href="login.css">
 
    <title>Masuk Akun</title>
</head>
<body>
    
    <div class="alert alert-warning" role="alert">
    <?php echo $_SESSION['error']?>
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
        <h2>Masuk Akun</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <label for=""><a href="lupapasword.php">lupa password?</a></label>
            </div>
            <button type="submit" value="submit" name="submit" class="btn" >masuk</button>
        </form>
        <p>Belum punya akun?</p>
        <a href="regis.php">Daftar</a>
    </div>
</body>
</html>