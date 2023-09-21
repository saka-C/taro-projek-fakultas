<?php
session_start();
if(isset($_SESSION['table'])){
    session_destroy();
    header('Location: IAdevice.php'); // Redirect kembali ke IAdevice setelah menghancurkan session
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./asset/style-inventory-dashboard.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Inventory</title>
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
                <li class="nav-link selected">
                    <a href="IAinventory.php">
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
  <div class="text">Inventory Perangkat Fakultas > Gedung A</div>
        <!-- ============== card device ============= -->
        <div class="centered centered-device">
            <div class="card-grid">
                <div class="card-device">
                    <form action="IAtable.php" method="post">
                        <input type="hidden" name="tipe" value="pc">
                        <input type="hidden" name="table" value="pc">
                        <button type="submit">
                            <i class='bx bx-desktop icon'></i>
                            <h3 class="card-title">Pc</h3>
                        </button>
                    </form>
                </div>
                <div class="card-device">
                    <form action="IAtable.php" method="post">
                        <input type="hidden" name="tipe" value="laptop">
                        <input type="hidden" name="table" value="pc">
                        <button type="submit">
                            <i class='bx bx-desktop icon'></i>
                            <h3 class="card-title">Laptop</h3>
                        </button>
                    </form>
                </div>
                <div class="card-device">
                    <form action="IAtable.php" method="post">
                        <input type="hidden" name="tipe" value="all-in-one">
                        <input type="hidden" name="table" value="pc">
                        <button type="submit">
                            <i class='bx bx-desktop icon'></i>
                            <h3 class="card-title">All-In-One</h3>
                        </button>
                    </form>
                </div>
                <div class="card-device">
                        <a href="IAtable.php?&table=printer">
                        <i class='bx bxs-printer icon' ></i>
                        <h3 class="card-title">Printer</h3>
                    </a>
                </div>
                <div class="card-device"> 
                        <a href="IAtable.php?&table=cctv">
                        <i class='bx bxs-cctv icon'></i>
                        <h3 class="card-title">CCTV</h3>
                    </a>
                </div>
                <div class="card-device">
                        <a href="IAtable.php?&table=wifi">
                        <i class='bx bx-wifi icon' ></i>
                        <h3 class="card-title">WIFI</h3>
                    </a>
                </div>
                <div class="card-device">
                    <form action="IAtable.php" method="post">
                        <input type="hidden" name="table" value="projek">
                        <button type="submit">
                            <i class='bx bx-slideshow icon'></i>
                            <h3 class="card-title">Projector</h3>
                        </button>
                    </form>
                </div>
                <div class="card-device">
                    <a href="table-spek-dashboard.html">
                        <i class='bx bx-dots-vertical-rounded icon'></i>
                        <h3 class="card-title">More</h3>
                    </a>
                </div>
            </div>
        </div>
        
        
        
        
        <!-- ============== end card device ============= -->
</section>

  <!-- End Main -->
  <script src="script-dashboard.js"></script>
  <script>
    const deviceLinks = document.querySelectorAll('.device-link');

    deviceLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();

            const namaGed = this.getAttribute('data-nama-ged');
            const tipe = this.getAttribute('data-tipe');
            const table = this.getAttribute('data-table');
            
            // Buat objek FormData untuk mengirim data
            const formData = new FormData();
            formData.append('nama_ged', namaGed);
            formData.append('tipe', tipe);
            formData.append('table', table);

            // Buat permintaan POST menggunakan XMLHttpRequest atau fetch
            fetch('IAtable.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                // Handle respons jika diperlukan
                if (response.ok) {
                    // Arahkan pengguna ke halaman yang sesuai hanya jika permintaan berhasil
                    window.location.href = 'IAtable.php';
                } else {
                    // Handle kesalahan jika ada masalah dalam permintaan
                    console.error('Ada kesalahan dalam permintaan POST');
                }
            })
            .catch(error => {
                // Handle error jika diperlukan
                console.error('Terjadi kesalahan:', error);
            });
        });
    });
</script>

</body>
</html>
