<?php
include "koneksi.php";
require 'functions.php';
if(isset($_POST['hapus'])){
    if(hapusPc($_POST) > 0){
        echo "<script> alert('Berhasil Hapus');
       </script>";
    }else{
        echo "<script> alert('gagal');
        </script>";
    }
}
?>
<?php 
include_once 'Pagination.class.php'; 
// Include database configuration file 
require_once 'koneksi.php'; 
require_once 'functiontable.php';

session_start();

if(isset($_POST['table'])) {
    $_SESSION['table'] = $_POST['table'];
}

if(isset($_POST['tipe'])) {
    $_SESSION['tipe'] = urldecode($_POST['tipe']);
}

$tipe = isset($_SESSION['tipe']) ? $_SESSION['tipe'] : '';

$table = $_SESSION['table'];

if(!isset($table)) {
    header('Location: IAdevice.php');
    exit();
}
no_resubmit();

$query_unit = mysqli_query($db, "SELECT * FROM unit");
$limit = 5; 



?>
<?php
    $hasilFungsi = IaUp($db, $tipe, $limit, $table);
    $query = $hasilFungsi['query'];
    $pagination = $hasilFungsi['pagination'];

    $tableInfo = table($query, $table, $tipe)
    
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

  <!-- js script -->
  <script>
    function searchFilter(page_num) {
    page_num = page_num?page_num:0;
    var keywords = $('#keywords').val();
    var filterBy = $('#filterBy').val();
    var tipe = "<?php echo $tipe; ?>";
    var table = "<?php echo $table; ?>";
    $.ajax({
        type: 'POST',
        url: 'IAgetData.php',
        data: {
                page: page_num,
                keywords: keywords,
                filterBy: filterBy, // Use selectedFilter here
                tipe: tipe,
                table: table
            },
            success: function(html) {
                $('#dataContainer').html(html);
            }
    });
}
    </script>
    <!-- end  -->
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

  <div class="text">Inventory Perangkat Fakultas > <?php echo $tipe ?></div>
        <!-- ============== Table Device ============= -->
        <div class="table-container">
            <div class="table-content">
               
            <div class="src-container">
            <input type="text" class="form-control" id="keywords" placeholder="Type keywords..." onkeyup="searchFilter(0, '');">
            </div>
            <div class="container-unit">
                <select class="form-control" id="filterBy" onchange="searchFilter();">
                    <option disabled selected value>Filter Unit</option>
                    <option value="">All</option>
                    <option value="public">Public</option>
                    <?php foreach($query_unit as $unit): ?>
                        <option value="<?php echo $unit['unit'] ?>"><?php echo $unit['unit'] ?></option>
                    <?php endforeach; ?>
                    
                </select>
            </div>
                 <div id="dataContainer">
                    <?php echo $tableInfo ?>
                    <a> <?php echo $pagination->createLinks(); ?></a>
                </div>           
            </div>
        </div>
        
        <!-- ============== end Table Device ============= -->
</section>

  <!-- End Main -->
  <script src="script-dashboard.js"></script>
</body>
</html>