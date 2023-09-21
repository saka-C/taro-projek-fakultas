<?php
include "koneksi.php";
require 'functions.php';

$kode_br=$_GET['kode_br'];

$table=$_GET['table'];

$sqlb= "SELECT * FROM proyektor WHERE kode_br=$kode_br";
$queryb= mysqli_query($db, $sqlb);
$data= mysqli_fetch_assoc($queryb);

$nama_ged = $data['nama_ged'];
$unit = $data['unit'];

if(mysqli_num_rows($queryb) < 1){
    die("data tidak ditemukan");
}

?>
<script>
    var nama_ged = "<?php echo $nama_ged ?>";
   
    var table = "<?php echo $table ?>";
</script>
<?php 
    // var_dump($_POST);
    if(isset($_POST['submit'])){
        if(updatePy($_POST) > 0){
            echo "<script> alert('berhasil di update'); window.location.href ='IAtablePro.php?nama_ged=' + nama_ged + '&table=' + table </script>";
        }else{
            echo "<script> alert('gagal update') </script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./asset/style-tambah-dashboard.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Tmabah PC</title>
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
                <li class="nav-link ">
                    <a href="IAinventory.php">
                        <i class='bx bxs-printer icon' ></i>
                        <span class="text nav-text">Perangkat Fakultas</span>
                    </a>
                </li>
                <li class="nav-link selected">
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
  <div class="text">Tambah PC</div>
<!-- ============== tampilan device ============= -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="container-detail">
        <div class="cards-grid-detail">
            <div class="card-detail">
                <div class="card-header-detail">
                    <h3 class="card-title">Informasi Pemilik PC</h3>
                </div>
                <div class="card-body">
                    <input type="hidden" name="kode_lama" value="<?php echo $data['kode_br']?>">
                    <input type="hidden" name="gambarLama" value="<?php echo $data['gambar']?>">
                    
                    <span class="judul">Gedung :</span>
                    <select name="nama_ged" >
                        <?php
                            include "./FK/koneksi.php";
                            $query_gedung = "SELECT nama_ged FROM gedung";
                            $result_gedung = mysqli_query($db, $query_gedung);

                            while ($row_gedung = mysqli_fetch_assoc($result_gedung)) {
                                $selected = ($nama_ged == $row_gedung["nama_ged"]) ? "selected" : "";
                                echo '<option value="' . $row_gedung["nama_ged"] . '" ' . $selected . '>' . $row_gedung["nama_ged"] . '</option>';
                            }
                        ?>
                    </select>
                    <span class="judul">Lantai :</span>
                        <input type="text" name="lantai" id="" value="<?php echo $data['lantai'] ?>"> 
                    <span class="judul">Ruang :</span>
                        <input type="text" name="ruang" id="" value="<?php echo $data['ruang'] ?>">            

                        <span class="judul">Unit :</span>
                        <select name="unit">
                        <option value="public">public</option>
                            <?php
                            include "./FK/koneksi.php";
                            $query_unit = "SELECT unit FROM unit";
                            $result_unit = mysqli_query($db, $query_unit);

                            while ($row_unit = mysqli_fetch_assoc($result_unit)) {
                                $selected = ($unit == $row_unit["unit"]) ? "selected" : "";
                                echo '<option value="' . $row_unit["unit"] . '" ' . $selected . '>' . $row_unit["unit"] . '</option>';
                            }
                            ?>
                        </select>
                    <span class="judul">Kode Barang :</span>
                        <input type="text" name="kode_br" value="<?php echo $data['kode_br']?>">
                    <span class="judul">Brand :</span>
                        <input type="text" name="brand" value="<?php echo $data['brand']?>">
                    <span class="judul">Model :</span>
                        <input type="text" name="tipe_model" value="<?php echo $data['tipe_model']?>">
                     
                    <span class="judul">Gamabr :</span>
                        <img src="img/<?php echo $data['gambar']; ?>"  class="card-img-top" style="height: 194px; width= 30px;">
                        <input type="file" name="gambar" id="gambar">
                    <!-- <div class="picture-container">
                        <div class="picture">
                            <input type="file" name="gambar" id="fileInput" accept="image/*">
                            <label for="fileInput" class="file-label">
                                <div class="plus-icon">+</div>
                                <img id="pictureImage" src="#" alt="" />
                            </label>
                        </div>
                    </div> -->
                    <button class="btn-ubah" name="submit" type="submit">update</button>
                </div>
            </div>
            
        </div>
    </div>
</form>






<!-- ============== end tampilan device ============= -->
</section>
</body>
</html>