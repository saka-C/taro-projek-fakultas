<?php
include 'koneksi.php';
require 'functions.php';
if(isset($_POST['submit'])){
    // var_dump($_POST);
    if(proyektor($_POST) > 0){
        echo "<script> alert('berhasil tambah device'); window.location='tambah-data.html' </script>";
      }else{
        echo "<script> alert('gagal tambah device');  window.location='IAadd-pc.php' </script> ";
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
  <title>Tmabah PC</title>
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
                    <a href="IAinventory.php">
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
  <div class="text">Tambah PC</div>
<!-- ============== tampilan device ============= -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="container-detail">
        <div class="cards-grid-detail">
            <div class="card-detail">
                <div class="card-header-detail">
                    <h3 class="card-title">Informasi Pemilik PC</h3>
                </div>
                <div class="card-body">
                    <span class="judul">Gedung :</span>
                        <select  name="nama_ged">
                            <option disabled selected value>Pilih Gedung</option>
                            <?php 
                            include "koneksi.php";
                            $query = "SELECT * FROM gedung";
                            $sql = mysqli_query($db, $query);
                            foreach ($sql as $qy){
                            ?>
                            <option value="<?php echo $qy['nama_ged'] ?>"><?php echo $qy['nama_ged'] ?></option>
                             <?php } ?>
                        </select>
                    <span class="judul">Lantai :</span>
                        <input type="text" name="lantai" placeholder="contoh:  1 atau G" autocomplete="off"> 
                    <span class="judul">Ruang :</span>
                        <input type="text" name="ruang" placeholder="contoh A-101" autocomplete="off">            
                    
                    
                        <span class="judul">Unit :</span>
                        <select name="unit">
                            <option disabled selected value>pilih unit sesuai gedung</option>
                            <option value="public">public</option>
                            <?php
                            include "koneksi.php";
                            $sql = mysqli_query($db, "SELECT * FROM unit");
                            while($data = mysqli_fetch_array($sql)){
                            echo " <option value=$data[unit]>$data[unit]</option>";
                            }
                            ?>
                        </select>
                    <span class="judul">Kode Barang :</span>
                        <input type="text"  name="kode_br" autocomplete="off" placeholder="hanya angka max 10">
                    <span class="judul">Brand :</span>
                        <input type="text"  name="brand" autocomplete="off" placeholder="Nama brand">
                    <span class="judul">Model :</span>
                        <input type="text"  name="tipe_model" autocomplete="off" placeholder="Tipe model">
                     
                    <div class="picture-container">
                        <div class="picture">
                            <input type="file" name="gambar" id="fileInput" accept="image/*">
                            <label for="fileInput" class="file-label">
                                <div class="plus-icon">+</div>
                                <img id="pictureImage" src="#" alt="" />
                            </label>
                        </div>
                    </div>
                    <button class="btn-ubah" name="submit" type="submit">tambah</button>
                </div>
            </div>
            
        </div>
    </div>
</form>






<!-- ============== end tampilan device ============= -->
</section>

  <!-- End Main -->
  <script src="script-dashboard.js"></script>
  <script>
    const fileInput = document.getElementById("fileInput");
    const profileImage = document.getElementById("pictureImage");
    const profilePicture = document.querySelector(".picture");
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
