<?php
include "koneksi.php";
require 'functions.php';
require 'functiontable.php';

if(isset($_POST['submit'])){
    if(updatePy($_POST) > 0){
        echo "<script> alert('berhasil di update'); window.location='IAtable.php'</script>";
    }else{
        echo "<script> alert('gagal update') </script>";
    }
}

session_start();
if(isset($_POST['kode_br'])) {
    $_SESSION['kode_br'] = $_POST['kode_br'];
}
$table = $_SESSION['table'];

$query_unit = "SELECT unit FROM unit";
$result_unit = mysqli_query($db, $query_unit);

$kode_br =  $_SESSION['kode_br'];

$sqlb= "SELECT * FROM proyektor INNER JOIN ruang ON proyektor.id_ruang = ruang.id_ruang WHERE kode_br=$kode_br";
$queryb= mysqli_query($db, $sqlb);
$data= mysqli_fetch_assoc($queryb);

$unit = $data['unit'];

if(mysqli_num_rows($queryb) < 1){
    die("data tidak ditemukan");
}


$tampil = IAspec($data, $table, $result_unit, $unit);
no_resubmit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./asset/style-tambah-dashboard.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <title>Inventory</title>
  <script>
    $(function() {
        $("#autocomplete").autocomplete({
            source: "fetchData.php",
            select: function(event, ui) {
                // Set the selected item's ID as the value of the hidden input field
                $("#selectedItemId").val(ui.item.id);
            }
        });
    });
  </script>
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
                    <a href="IAdevice.php">
                        <i class='bx bxs-printer icon' ></i>
                        <span class="text nav-text">Perangkat Fakultas</span>
                    </a>
                </li>
                <li class="nav-link ">
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
  
<!-- ============== tampilan device ============= -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="container-detail">
        <div class="cards-grid-detail">
            <?php echo $tampil; ?>
        </div>
    </div>
</form>
<!-- ============== end tampilan device ============= -->
</section>
</body>
</html>