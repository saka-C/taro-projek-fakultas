<?php

session_start(); 

require 'rl.php';
 if (isset($_SESSION['usera'])) {
  header("Location:dashboard.php");
}
if (isset($_SESSION['useru'])) {
    header("Location:indexx.php");
  }
  
if (!isset($_SESSION['usernew'])) {
    header("Location:login.php");
}
if (isset($_POST['submit'])) {
    profile($_POST); // Memanggil fungsi regis() untuk memproses pendaftaran
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
        <h2>Buat profil Anda</h2>
        <form action="" method="POST">
            <div class="profile-container">
                <div class="profile-picture">
                    <input type="file" id="fileInput" accept="image/*">
                    <label for="fileInput" class="file-label">
                        <div class="plus-icon">+</div>
                        <img id="profileImage" src="#" alt="" />
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>nama</label>
                <input type="text" id="nama" name="nama" placeholder="Masukan nama asli" required>
            </div>
            <div class="form-group">
                <label>Anda adalah</label>
                <select name="status" id="status" >
                    <option disabled selected value> Pilih status anda </option>
                    <option value="dosen">dosen</option>
                    <option value="mahasiswa">mahasiswa</option>
                    <option value="pegawai">pegawai</option>
                </select>
            </div>
            <button type="submit" name="submit" value="submit">buat profil</button>
            
        </form>
    </div>


    <script>
        const fileInput = document.getElementById("fileInput");
        const profileImage = document.getElementById("profileImage");
        const profilePicture = document.querySelector(".profile-picture");
        const plusIcon = document.querySelector(".plus-icon");

        fileInput.addEventListener("change", (event) => {
        const selectedFile = event.target.files[0];
        if (selectedFile) {
            const reader = new FileReader();
            reader.onload = (e) => {
            profileImage.src = e.target.result;
            profilePicture.classList.add("has-image");
            profilePicture.classList.add("has-dashed");
            plusIcon.style.display = "none";

            };
            reader.readAsDataURL(selectedFile);
        } else {
            profileImage.src = "";
            profilePicture.classList.remove("has-image");
            profilePicture.classList.remove("has-dashed");
            plusIcon.style.display = "block";
        }
        });

      </script>
</body>
</html>