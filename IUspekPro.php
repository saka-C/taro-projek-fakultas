<?php
include "koneksi.php";
require "functions.php";
$kode_br=$_GET['kode_br'];

$sqlb= "SELECT * FROM proyektor WHERE kode_br=$kode_br";
$queryb= mysqli_query($db, $sqlb);
$data= mysqli_fetch_assoc($queryb);


    if(mysqli_num_rows($queryb) < 1){
        die("data tidak ditemukan");
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/style-inventory.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Inventory</title>
</head>
<body>
    <div class="container">
        <!-- ================================ Navbar ======================================
        ===========================================================================  -->
        <nav class="navbar nav-tiket">
                    <div class="logo">
                        <img src="./asset/logoui.png" alt="">
                        <div class="logo-text">
                            <span class="logo-name"><a href="#">Fakultas</a></span>
                            <span class="logo-profession"><a href="#">Psikologi</a></span>
                        </div>
                    </div>
                    <div class="con-nav-prof">
                        <div class="nav-links">
                            <a href="inventory.html">Inventory</a>
                            <a href="laporan.html">Laporkan Masalah</a>
                            <a href="contact.html">Contact</a>
                            <div class="drop-prof">
                                <a href="profil-sett.html">Profil</a>
                                <a href="logout-html">Log-out</a>
                            </div>                   
                        </div>
                        <div class="burger">
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                        </div>
                        <div class="profile">
                            <a href="#">Halo 'Shaka'</a>
                            <div class="dropdown">
                                <button class="dropbtn"><span class="arrow-down"><i class='bx bxs-down-arrow'></i></span></button>
                                <div class="dropdown-content">
                                    <a href="#">Profil</a>
                                    <a href="#">Log-out</a>
                                </div>
                            </div>
                            <img src="./asset/profil.jpg" alt="">
                        </div>
                    </div>
                    
                </nav>
<!-- ================================ Navbar end ================================
===========================================================================  -->

        <div class="container-detail">
            <div class="cards-grid-detail">
                <div class="card-detail">
                    <div class="card-header-detail">
                    <h3 class="card-title">Informasi Pemilik PC</h3>
                    </div>
                    <div class="card-body">
                        <span class="judul">Gedung :</span>
                        <p><?php echo $data['nama_ged'] ?></p>
                        <span class="judul">Lantai :</span>
                        <p><?php echo $data['lantai'] ?></p>
                        <span class="judul">Ruang :</span>
                        <p><?php echo $data['ruang'] ?></p>
                        <span class="judul">Unit :</span>
                        <p><?php echo $data['unit'] ?></p>
                        <span class="judul">Kode Barang :</span>
                        <p><?php echo $data['kode_br'] ?></p>
                        <span class="judul">Brand :</span>
                        <p><?php echo $data['brand'] ?></p>
                        <span class="judul">Tipe Model:</span>
                        <p><?php echo $data['tipe_model'] ?></p>
                        <span class="judul">Gambar:</span> 
                        <img src="img/<?php echo $data['gambar']; ?>" alt="Gambar PC">
                    </div>
                </div>
            </div>    
        </div>
</body>
</html>