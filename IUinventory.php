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
        <!-- ============== card GEDUNG ============= -->
        <?php
            include "koneksi.php";
            $query = "SELECT * FROM gedung";         
            $data = mysqli_query($db, $query);
        ?>
        <div class="centered">
            <div class="card-grid">
                 <!-- looping -->
                 <?php foreach($data as $dt): ?>
                <div class="card">
                    <a href='IUdevice.php?nama_ged="<?php echo $dt['nama_ged'] ?>"'>
                        <i class='bx bxs-buildings ikon'></i>
                        <h3 class="card-title"><?php echo $dt['nama_ged'] ?></h3>
                    </a> 
                </div>
                <?php endforeach; ?>
                
                <!-- Tambahkan card lainnya hingga Gedung H -->
            </div>
        </div>
        
        
        
        
        
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

