<?php
require 'rl.php';
session_start(); 
 if (!isset($_SESSION['usera'])) {
  header("Location:index.php");
}else if (isset($_SESSION['useru'])) {
  header("Location:index.php");
}
// if(isset($_POST['submit'])){
//     if(isset($_POST['id_report'])){
//         updatestatus($_POST);
//     }                
// }



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./asset/style-dash.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Dashboard Admin</title>
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
                <li class="nav-link selected">
                    <a href="#">
                        <i class='bx bxs-tachometer icon' ></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a class="smooth-transition" href="../inventory/inventory.html">
                        <i class='bx bxs-printer icon' ></i>
                        <span class="text nav-text">Perangkat Fakultas</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a class="smooth-transition" href="../tambah/tambah.html">
                        <i class='bx bx-folder-plus icon'></i>
                        <span class="text nav-text">Tambah Inventory</span>
                    </a>
                </li>
                <li class="nav-link ">
                    <a class="smooth-transition" href="notif.php">
                        <i class='bx bx-comment-error icon '></i> 
                        <span class="text nav-text">Notifikasi Masalah</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a class="smooth-transition" href="histori.php">
                        <i class='bx bx-history icon'></i> 
                        <span class="text nav-text">Riwayat</span>
                    </a>
                </li>                          
            </ul>
        </div>
        <div class="bottom-content">
            <li class="">
                <a href="logout.php">
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
  <div class="text">Dashboard</div>
    <div class="dashboard">
      <div class="card notif">
        <h2 class="number"><span id="count"></span></h2>
        <p class="name">Notifikasi masuk hari ini</p>
        <script>
          function updatecount() {
              const xhr = new XMLHttpRequest();
              xhr.open("GET", "waktu.php", true);
              xhr.onreadystatechange = function () {
                  if (xhr.readyState === 4 && xhr.status === 200) {
                    const data = JSON.parse(xhr.responseText);
                    document.querySelector('#count').innerText = data.jumlah;
                  }
              };
              xhr.send();
          }

          updatecount(); // Panggil fungsi saat halaman dimuat

          setInterval(updatecount, 3000); // Panggil fungsi setiap 3 detik
      </script>
      </div>
      <div class="card clear">
        <h2 class="number"><span id="counts"></span></h2>
        <p class="name">Masalah selesai</p>
        <script>
          function updatecounts() {
              const xhr = new XMLHttpRequest();
              xhr.open("GET", "data_selesai.php", true);
              xhr.onreadystatechange = function () {
                  if (xhr.readyState === 4 && xhr.status === 200) {
                    const data = JSON.parse(xhr.responseText);
                    document.querySelector('#counts').innerText = data.selesai;
                  }
              };
              xhr.send();
          }

          updatecounts(); // Panggil fungsi saat halaman dimuat

          setInterval(updatecounts, 3000); // Panggil fungsi setiap 3 detik
      </script>
      </div>
      <div class="card total">
        <h2 class="number"><span id="total"></span></h2>
        <p class="name">Total Masalah</p>
        <script>
          function updatetotal() {
              const xhr = new XMLHttpRequest();
              xhr.open("GET", "data_total.php", true);
              xhr.onreadystatechange = function () {
                  if (xhr.readyState === 4 && xhr.status === 200) {
                    const data = JSON.parse(xhr.responseText);
                    document.querySelector('#total').innerText = data.total;
                  }
              };
              xhr.send();
          }

          updatetotal(); // Panggil fungsi saat halaman dimuat

          setInterval(updatetotal, 3000); // Panggil fungsi setiap 3 detik
      </script>
      </div>
      <div class="card data">
        <h2 class="number">25</h2>
        <p class="name">Data Inventory</p>
      </div>

    </div>
<!-- ========== info ========= -->

<div class="container-main-info">
  <div class="dashed-line"></div> <!-- Garis putus-putus di dalam card -->
  <div class="dashed-line-2"></div> <!-- Garis putus-putus di dalam card -->
  <div class="main-card">
    <div class="current-number">
      <span class="current-number-text">Ticketing Masalah</span>
      <i class='bx bxs-user-voice icon-dash'></i>
    </div>
    <div class="current-number">
      <span class="current-number-text">Inventory Perangkat</span>
      <i class='bx bxs-package icon-dash'></i>
    </div>
    
    <div class="current-number">
      <span class="current-number-text">Report  </span>
      <i class='bx bxs-report icon-dash'></i>
    </div>
  </div>
  
</div>


<!-- ========== end info ========= -->


    <!-- ========== Notif ========= -->

<div class="notifikasi">
  <div class="text">Notifikasi <span class="badge badge-light" id="notif"> </span></div>
  <div class="notification-container">
    <form action="" method="POST">
      <table id="notification-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Pelapor</th>
            <th>Lokasi</th>
            <th>Posisi</th>
            <th>Jenis</th>
            <th>deskripsi</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        
        </tbody>
      </table>
    </form>
  </div>
</div>

<!-- ========== end Notif ========= -->

<!-- ================ tiket yg sedang di kerjakan =================== -->
<div class="line-container">
  <div class="line">
    <h1>Tiket sedang dalam pengerjaan</h1>
    
    <div><p>.</p></div>
    <form action="" method="POST">
      <table id="notification-tables">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Pelapor</th>
            <th>Lokasi</th>
            <th>Jenis</th>
            <th>deskripsi</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        
        </tbody>
      </table>
    </form>
  </div>
</div>

<!-- ============================ Tiket =================================
===========================================================================  -->

<!-- ============================ end Tiket =================================
===========================================================================  -->

<div id="popupContainer" class="popup-selesai">
  <div class="popup-content">
    <span class="close-selesai" id="closePopupBtn">&times;</span>
    <h2>Penyesesaian Masalah</h2>
    <form id="feedbackForm">
      <label for="feedback">Tulisakan keterangan:</label>
      <textarea id="feedback" name="feedback" rows="4" cols="50" required></textarea>
      <button type="submit">selesaikan</button>
    </form>
  </div>
</div>

</section>

  <!-- End Main -->
  <script src="script-dashboard.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="tampil.js"></script>
<script src="tampil3.js"></script>
<script src="tampilpengerjaan.js"></script>
</body>
</html>