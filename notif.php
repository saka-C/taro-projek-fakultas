<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./asset/style-dash.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Notifikasi</title>
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
                    <a class="smooth-transition" href="dashboard.php">
                        <i class='bx bxs-tachometer icon' ></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a class="smooth-transition" href="inventory-dashboard.html">
                        <i class='bx bxs-printer icon' ></i>
                        <span class="text nav-text">Perangkat Fakultas</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a class="smooth-transition" href="tambah-data.html">
                        <i class='bx bx-folder-plus icon'></i>
                        <span class="text nav-text">Tambah Inventory</span>
                    </a>
                </li>
                <li class="nav-link selected">
                    <a href="#">
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
    <div class="text">Notifikasi <span class="badge badge-light" id="notif"></div>
    <!-- start Notif -->
    
    <div class="notification-list" href="#">
        
        <div class="notification-card" id="pesan">
        
        <!-- loop -->
        
            <div class="notification-no"></div>
            <div class="short">
           </div>

          <div class="notification-actions">
            <button class="btn-tangani" onclick="showDetail('', '', '', '', '')">Tangani</button>
          </div>
        </div>     
        <div class="notification-name"></div>
        <div class="notification-info"></div>
            
           
      <!-- Add more notification cards as needed -->
      </div>
<!-- end Notif -->
<!-- ================= Report SELESAI =================== -->

<!-- ================= Report SELESAI end =================== -->
      
<!-- Popup -->
<div class="popup" id="popup">
        <div class="popup-content">
            <span class="closePopup" onclick="closePopup()">&times;</span>
            <div id="popupDetail"></div>
          <form id="tanganiForm" onsubmit="submitForm(event)">
            <label for="namaTenagaKerja">Nama Tenaga Kerja:</label>
            <input type="text" autocomplete="off" id="namaTenagaKerja" required>
            <button type="submit">Confirm</button>
          </form>
        </div>
        
    </div>
  <!-- end Notif -->
</section>

  <!-- End Main -->
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="script.js"></script>
  <script src="script-dashboard.js"></script>
  <script src=""></script>
</body>
</html>