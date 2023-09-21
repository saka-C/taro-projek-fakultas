<?php
include "koneksi.php";
require "functions.php";
if(isset($_POST['ruangb'])){
   
    if(ruang($_POST) > 0){
        echo "<script> alert('berhasil tambah gedung') </script>";
    }else{
        echo "<script> alert('gagal tambah gedung') </script>";
    }
}

if(isset($_POST['unitb'])){
   if(unit($_POST) > 0){
    echo "<script> alert('berhasil tambah unit') </script>";
   }else{
    echo "<script> alert('gagal tambah unit') </script>";
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./asset/style-tambah-dashboard.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Tambah Data PC</title>
</head>
<body>
    <!-- start Navbar -->
  <div class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="./asset/logoui.png" alt="">
            </span>
            <div class="text header-text">
                <span class="name">Admin</span>
                <span class="profession">Tim IT Fakultas</span>
            </div>
        </div>            

        <i class='bx bx-chevron-right toggle'></i>
    </header>
    <div class="menu-bar">
        <div class="menu">
            <ul class="menu-link">
                <li class="nav-link ">
                    <a class="smooth-transition" href="dashboard.html">
                        <i class='bx bxs-tachometer icon' ></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link ">
                    <a class="smooth-transition" href="IAinventory.php">
                        <i class='bx bxs-printer icon' ></i>
                        <span class="text nav-text">Perangkat Fakultas</span>
                    </a>
                </li>
                <li class="nav-link selected">
                    <a class="smooth-transition" href="tambah-data.html">
                        <i class='bx bx-folder-plus icon'></i>
                        <span class="text nav-text">Tambah Inventory</span>
                    </a>
                </li>
                <li class="nav-link ">
                    <a class="smooth-transition" href="notifikasi.html">
                        <i class='bx bx-comment-error icon '></i> 
                        <span class="text nav-text">Notifikasi Masalah</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a class="smooth-transition" href="../riwayat/riwayat.html">
                        <i class='bx bx-history icon'></i> 
                        <span class="text nav-text">Riwayat</span>
                    </a>
                </li>                          
            </ul>
        </div>
        <div class="bottom-content">
            <li class="">
                <a href="#">
                    <i class='bx bx-log-out icon'></i> 
                    <span class="text nav-text">Log-Out</span>
                </a>
            </li>   
            <li class="mode">


            </li>
        </div>
    </div>
</div>
  <!-- End Navbar -->

  <!-- start Main -->
<section class="home">
  <div class="text">Tambah Data ruang & Unit</div>
  <!-- start Form -->
  <div class="form-container">
    <form method="post">
        <div class="form-group">
            <h3>Tambah Data ruang</h3>
          <label for="gedung">Nama ruang:</label>
            <input type="text" name="ruang" placeholder="Contoh A-101">
          <label for="gedung">Lantai:</label>
            <input type="text" name="lantai" placeholder="Contoh 1 atau G">
          <label for="gedung">Nama Gedung:</label>
            <input type="text" name="nama_ged" placeholder="Contoh GEDUNG-A">
        </div>
        <button type="submit" name="ruangb">Submit</button>
    </form>
</div>
<br>
  <!-- End Form -->
    <!-- start Form -->
    <div class="form-container">
        <form method="post">
            <div class="form-group">
            <h3>Tambah Data Unit</h3>
            <div class="form-group">
              <label for="gedung">Nama Unit:</label>
                <input type="text" name="unit" placeholder="Masukan nama Unit baru">
            </div>
            <button type="submit" name="unitb">Submit</button>
        </form>
    </div>
      <!-- End Form -->
</section>

  <!-- End Main -->
  <script src="script-dashboard.js"></script>
</body>
</html>
