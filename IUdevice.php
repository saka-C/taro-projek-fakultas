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
<?php
include "koneksi.php";
$nama_ged=$_GET['nama_ged'];
$sqlb= "SELECT * FROM gedung WHERE nama_ged=$nama_ged";
$queryb= mysqli_query($db, $sqlb);
$data= mysqli_fetch_assoc($queryb);

?>
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
        
        <!-- ============== card device ============= -->
        <div class="centered centered-device">
            <div class="card-grid">
                <div class="card-device">
                    <a href="IUtable.php?nama_ged=<?php echo ($data['nama_ged']) ?> &tipe=pc &table=pc">
                        <i class='bx bx-desktop icon'></i>
                        <h3 class="card-title">PC</h3>
                    </a>
                </div>
                <div class="card-device">
                    <a href="IUtable.php?nama_ged=<?php echo ($data['nama_ged']) ?> &tipe=laptop &table=pc">
                        <i class='bx bx-desktop icon'></i>
                        <h3 class="card-title">Laptop</h3>
                    </a>
                </div>
                <div class="card-device">
                    <a href="IUtable.php?nama_ged=<?php echo ($data['nama_ged']) ?> &tipe=all-in-one &table=pc">
                        <i class='bx bx-desktop icon'></i>
                        <h3 class="card-title">All-In-One</h3>
                    </a>
                </div>
                <div class="card-device">
                    <a href="table-spek.html">
                        <i class='bx bxs-printer icon' ></i>
                        <h3 class="card-title">Printer</h3>
                    </a>
                </div>
                <div class="card-device">
                    <a href="table-spek.html">
                        <i class='bx bxs-cctv icon'></i>
                        <h3 class="card-title">CCTV</h3>
                    </a>
                </div>
                <div class="card-device">
                    <a href="table-spek.html">
                        <i class='bx bx-wifi icon' ></i>
                        <h3 class="card-title">WIFI</h3>
                    </a>
                </div>
                <div class="card-device">
                    <a href="IUtable.php?nama_ged=<?php echo ($data['nama_ged']) ?> &table=projek">
                        <i class='bx bx-slideshow icon'></i>
                        <h3 class="card-title">Projector</h3>
                    </a>
                </div>
                <div class="card-device">
                    <a href="table-spek.html">
                        <i class='bx bx-dots-vertical-rounded icon'></i>
                        <h3 class="card-title">More</h3>
                    </a>
                </div>
            </div>
        </div>
        
        
        
        <!-- ============== end card device ============= -->
        
        
        
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
