<?php

session_start(); 

require 'function.php';
require 'rl.php';
if(isset($_SESSION['usera'])){
    header('Location: dashboard.php');
}

?>
<?php if(isset($_SESSION['useru'])): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Home</title>
</head>
<body>
    <div class="container">

<!-- ================================ Navbar ======================================
===========================================================================  -->
        <nav class="navbar">
            <div class="logo">
                <img src="./asset/logoui.png" alt="">
                <div class="logo-text">
                    <span class="logo-name"><a href="#">Fakultas</a></span>
                    <span class="logo-profession"><a href="#">Psikologi</a></span>
                </div>
            </div>
            <div class="con-nav-prof">
                <div class="nav-links">
                    <a href="#">Inventory</a>
                    <a href="problem.php">Laporkan Masalah</a>
                    <a href="#">Contact</a>
                    <div class="drop-prof">
                        <a href="#">Profil</a>
                        <a href="#">Log-out</a>
                    </div>                   
                </div>
                <div class="burger">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
                <div class="profile">
                <a href="#" id="usernameLink"><h4>halo <span id="nama"></span></h4></a>
                    <script>
                        function updateUsername() {
                            const xhr = new XMLHttpRequest();
                            xhr.open("GET", "get_nama.php", true);
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    const data = JSON.parse(xhr.responseText);
                                    document.getElementById("nama").textContent = data.username;
                                }
                            };
                            xhr.send();
                        }

                        updateUsername(); // Panggil fungsi saat halaman dimuat

                        setInterval(updateUsername, 3000); // Panggil fungsi setiap 3 detik
                    </script>
                    <div class="dropdown">
                        <button class="dropbtn"><span class="arrow-down"><i class='bx bxs-down-arrow'></i></span></button>
                        <div class="dropdown-content">
                            <a href="#">Profil</a>
                            <a href="logout.php">Log-out</a>
                        </div>
                    </div>
                    <img src="./asset/profil.jpg" alt="">
                </div>
            </div>
            
        </nav>
<!-- ================================ Navbar end ================================
===========================================================================  -->

<!-- ============================== thumnail ==================================
===========================================================================  -->
        <div class="thumnail">
            <img src="./asset/thumnail.jpg" alt="Background Image">
            <span><h1>Inventory & Laporan Masalah Device Fakultas Psikologi</h1></span>
            <hr class="divider"> <!-- Garis horizontal sebagai pembatas gambar -->
        </div>
<!-- =========================== thumnail end ===============================
===========================================================================  -->

<!-- ============================== content =================================
===========================================================================  -->
<div class="all-content">
    <div class="content-container">
        <div class="content">
            <div class="image">
                <img src="./asset/konten-invent.jpg" alt="Image">
            </div>
            <div class="text">
                <h2>Pengen Tau Spesifikasi Spesifikasi Perangkat Fakultas Kamu?</h2>
                <p>Disini kamu bisa cek semua perangkat device di fakultas kamu secara lengkap dan detail</p>
                <a href="#">Cek inventory</a>
            </div>
        </div>
    </div>
    <div class="content-container additional-container">
        <div class="content additional-content">
            <div class="image">
                <img src="./asset/konten-ticketing.jpg" alt="Image">
            </div>
            <div class="text">
                <h2>Device Kamu Bermasalah?</h2>
                <p>Kamu bisa melapor langsung ke Tim IT fakultas dengan melaporkan kendala device kamu disini</p>
                
                <a href="problem.php">Laporkan Kendala</a>
                <a href="testing2.php">Tiket Anda</a>
            </div>
        </div>
    </div>

</div>

<!-- ============================ end content =================================
===========================================================================  -->


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



    </div>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="tampil.js"></script>
<script src="tampil2.js"></script>
<script src="scriptt.js"></script>  
</body>
</html>
<?php else: ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Home</title>
</head>
<body>
    <div class="container">

<!-- ================================ Navbar ======================================
===========================================================================  -->
        <nav class="navbar">
            <div class="logo">
                <img src="./asset/logoui.png" alt="">
                <div class="logo-text">
                    <span class="logo-name"><a href="#">Fakultas</a></span>
                    <span class="logo-profession"><a href="#">Psikologi</a></span>
                </div>
            </div>
            <div class="con-nav-prof">
                <div class="nav-links">
                    <a href="login.php">Login</a>
                    <a href="#">Inventory</a>
                    <a href="#" id="laporkan">Laporkan Masalah</a>
                    <script>
                    document.getElementById("laporkan").addEventListener("click", function(event) {
                        event.preventDefault();  // Mencegah tautan dari mengarahkan pengguna ke halaman lain

                        // Cek apakah pengguna sudah login atau belum
                        // Di sini Anda harus memiliki kode untuk memeriksa status login pengguna
                        var userLoggedIn = false;  // Ganti dengan logika pemeriksaan login sesuai dengan implementasi Anda

                        if (userLoggedIn) {
                            // Jika pengguna sudah login, lakukan tindakan yang sesuai, misalnya munculkan formulir pelaporan
                            alert("Anda akan diarahkan ke halaman pelaporan kendala.");
                            // Lakukan lebih banyak tindakan yang diperlukan di sini
                        } else {
                            // Jika pengguna belum login, tampilkan pesan peringatan dan arahkan ke halaman login
                            alert("Anda harus login terlebih dahulu.");
                            window.location.href = "login.php";
                        }
                    });
                </script>
                    <a href="#">Contact</a>
                                    
                </div>
                <div class="burger">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
                
            </div>
            
        </nav>
<!-- ================================ Navbar end ================================
===========================================================================  -->

<!-- ============================== thumnail ==================================
===========================================================================  -->
        <div class="thumnail">
            <img src="./asset/thumnail.jpg" alt="Background Image">
            <span><h1>Inventory & Laporan Masalah Device Fakultas Psikologi</h1></span>
            <hr class="divider"> <!-- Garis horizontal sebagai pembatas gambar -->
        </div>
<!-- =========================== thumnail end ===============================
===========================================================================  -->

<!-- ============================== content =================================
===========================================================================  -->
<div class="all-content">
    <div class="content-container">
        <div class="content">
            <div class="image">
                <img src="./asset/konten-invent.jpg" alt="Image">
            </div>
            <div class="text">
                <h2>Pengen Tau Spesifikasi Spesifikasi Perangkat Fakultas Kamu?</h2>
                <p>Disini kamu bisa cek semua perangkat device di fakultas kamu secara lengkap dan detail</p>
                <a href="#">Cek inventory</a>
            </div>
        </div>
    </div>
    <div class="content-container additional-container">
        <div class="content additional-content">
            <div class="image">
                <img src="./asset/konten-ticketing.jpg" alt="Image">
            </div>
            <div class="text">
                <h2>Device Kamu Bermasalah?</h2>
                <p>Kamu bisa melapor langsung ke Tim IT fakultas dengan melaporkan kendala device kamu disini</p>
                <a href="#"id="lapor">Laporkan Kendala</a>
                <script>
                    document.getElementById("lapor").addEventListener("click", function(event) {
                        event.preventDefault();  // Mencegah tautan dari mengarahkan pengguna ke halaman lain

                        // Cek apakah pengguna sudah login atau belum
                        // Di sini Anda harus memiliki kode untuk memeriksa status login pengguna
                        var userLoggedIn = false;  // Ganti dengan logika pemeriksaan login sesuai dengan implementasi Anda

                        if (userLoggedIn) {
                            // Jika pengguna sudah login, lakukan tindakan yang sesuai, misalnya munculkan formulir pelaporan
                            alert("Anda akan diarahkan ke halaman pelaporan kendala.");
                            // Lakukan lebih banyak tindakan yang diperlukan di sini
                        } else {
                            // Jika pengguna belum login, tampilkan pesan peringatan dan arahkan ke halaman login
                            alert("Anda harus login terlebih dahulu.");
                            window.location.href = "login.php";
                        }
                    });
                </script>

            </div>
        </div>
    </div>

</div>

<!-- ============================ end content =================================
===========================================================================  -->
<section id="antrian" >
        <div class="pembatas" >
            <h2>Tiket Masalah <span class="badge badge-light" id="notif"></span></h2>
            <div class="garis-section">
                <span>_</span>
            </div>
        </div>
            <div class="container-ticket" id="pesan">
                <!-- Tiket masalah akan ditampilkan di sini oleh AJAX -->
            </div>
        
</section>

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



    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="tampil.js"></script>
<script src="tampilnotif.js"></script>
    <script src="scriptt.js"></script>
</body>
</html>
<?php endif; ?>


