<?php
include "koneksi.php";
require "functions.php";
$kode_br=$_GET['kode_br'];

$sqlb= "SELECT * FROM pc WHERE kode_br=$kode_br";
$queryb= mysqli_query($db, $sqlb);
$data= mysqli_fetch_assoc($queryb);

$kondisi = $data['kondisi'];
$keterangan = $data['keterangan'];
$tipe = $data['tipe'];

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
    <title>Pilih Gedung</title>
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

<!-- ============== tampilan device ============= -->
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
                <span class="judul">Kode Barang :</span>
                <p><?php echo $data['kode_br'] ?></p>
                <span class="judul">Tipe Komputer :</span>
                <p><?php echo $data['tipe'] ?></p>
                <span class="judul">Pemilik :</span>
                <p><?php echo $data['nama_u'] ?></p>
                <span class="judul">Unit :</span>
                <p><?php echo $data['unit'] ?></p>
                <span class="judul">Nama Komputer:</span>
                <p><?php echo $data['nama_pc'] ?></p>
                <?php
                if ($tipe !== 'pc') {
                    echo '<span class="judul">Brand :</span>';
                    echo '<p>' . $data['brand_pc'] . '</p>';
                }
                ?>
                <span class="judul">Tahun:</span>
                <p><?php echo $data['tahun'] ?></p>
                <span class="judul">Operating System:</span>
                <p><?php echo $data['os'] ?></p>
                <span class="judul">Kondisi :</span>
                <?php if($kondisi == 'baik'){
                    echo '<p>Device dalam kondisi baik</p>';
                }elseif($kondisi == 'kurang'){
                    echo '<p>Device dalam kondisi kurang baik</p>';
                }elseif($kondisi == 'service'){
                    echo '<p>Device dalam kondisi perbaikan</p>';
                }elseif($kondisi == 'rusak'){
                    echo '<p>Device rusak</p>';
                }
                ?>
              
                <?php
                if ($kondisi !== 'baik') {
                    echo '<span class="judul">Keterangan :</span>';
                    echo '<p>' . $data['keterangan'] . '</p>';
                }
                ?>
                <span class="judul">Gambar:</span> 
                <img src="img/<?php echo $data['gambar']; ?>" alt="Gambar PC">
            </div>
        </div>
        <div class="card-detail">
            <div class="card-header-detail">
                <h3 class="card-title">Spesifikasi PC</h3>
            </div>
            <div class="card-body">
                <span class="judul">Tipe Storage :</span>
                <p><?php echo $data['tipe_rom'] ?></p>  
                <span class="judul">Size ROM :</span>
                <p><?php echo $data['size_rom'] ?></p>  
                <span class="judul">Tipe RAM :</span>
                <p><?php echo $data['tipe_ram'] ?></p>  
                <span class="judul">Penyimpanan RAM :</span>
                <p><?php echo $data['size_rom'] ?></p>  
                <span class="judul">Processor :</span>
                <p><?php echo $data['cpu'] ?></p>  
                <span class="judul">LAN :</span>
                <p><?php echo $data['lan'] ?></p>  
                <span class="judul">Ip LAN:</span>
                <p><?php echo $data['ip'] ?></p>  
                <span class="judul">WiFi :</span>
                <p><?php echo $data['wifi'] ?></p>  
                <span class="judul">Brand Monitor:</span>
                <p><?php echo $data['brand_mo'] ?></p>  
                <span class="judul">Ukuran Layar Monitor:</span>
                <p><?php echo $data['ukuran_mo'] ?></p>     
                <!-- Tambahkan informasi pemilik PC sesuai kebutuhan -->
            </div>
        </div>
    </div>
</div>





<!-- ============== end tampilan device ============= -->
        
        
        <!-- ============================ footer =================================
        ===========================================================================  -->
        <footer class="footer">
            <div class="footer-logo">
                <img src="./asset/logoui.png" alt="Logo">
                <div class="logo-text">
                    <span class="name">Tim IT</span>
                    <span class="profesion">Fakultas Psikologi</span>
                </div>
            </div>
            <div class="footer-credit">
                <p>Shaka Aufa,Renaldi Aditya,Rafli Febrian & All IT support</p>
            </div>
            <div class="footer-copyright">
                <p>© 2023 Fpsi UI. All rights reserved.</p>
            </div>
        </footer>
        <!-- ========================== End footer =================================
        ===========================================================================  -->
<script src="script.js"></script>
</body>
</html>

