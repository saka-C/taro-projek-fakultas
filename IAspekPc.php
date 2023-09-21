<?php
include "koneksi.php";
require 'functions.php';



$kode_br = $_POST['kode_br'];



$sqlb= "SELECT * FROM pc INNER JOIN ruang ON pc.id_ruang = ruang.id_ruang WHERE kode_br=$kode_br";
$queryb= mysqli_query($db, $sqlb);
$data= mysqli_fetch_assoc($queryb);


$tipe = $data['tipe'];
$unit = $data['unit'];
$rom = $data["tipe_rom"];
$Lan = $data["lan"];
$Wifi = $data["wifi"];
$tahun = $data['tahun'];
$year = (int)$tahun;
$kondisi = $data['kondisi'];

    if(mysqli_num_rows($queryb) < 1){
        die("data tidak ditemukan");
    }
?>

<?php 
    if(isset($_POST['submit'])){
        
        if(updatePc($_POST) > 0){
            echo "<script> alert('berhasil di update'); window.location='IAtable.php'</script>";
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
  <link rel="stylesheet" href="./asset/style-inventory-dashboard.css">
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
  <div class="text">Inventory Perangkat Fakultas </div>
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
                    <input type="hidden" name="id_ruang" id="selectedItemId" value="<?php echo $data['id_ruang'] ?>">
                    
                    
                    <span class="judul">Ruang :</span>
                    <input type="text" name="" id="autocomplete" value="<?php echo $data['ruang'] ?>">
  
                    <span class="judul">Kode Barang :</span>
                        <input type="text" name="kode_br" value="<?php echo $data['kode_br']?>">
                    <span class="judul">tipe :</span>
                        <select name="tipe" id="">
                            <?php
                            if($tipe == 'laptop'){
                                echo "<option value='laptop' selected>LAPTOP</option>
                                <option value='pc'>PC</option>
                                <option value='alo'>ALL-IN-ONE</option>";
                            }else if($tipe == 'pc'){
                                echo "<option value='laptop'>LAPTOP</option>
                                <option value='pc' selected>PC</option>
                                <option value='alo'>ALL-IN-ONE</option>";
                            }elseif($tipe == 'alo'){
                                echo "<option value='laptop'>LAPTOP</option>
                                <option value='pc' >PC</option>
                                <option value='alo' selected>ALL-IN-ONE</option>";
                            }
                            ?> 
                        </select>
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
                    <span class="judul">Pemilik :</span>
                        <input type="text" name="nama_u" id="" value="<?php echo $data['nama_u'] ?>">
                    <span class="judul">Nama Komputer:</span>
                        <input type="text" name="nama_pc" id="" value="<?php echo $data['nama_pc'] ?>">
                    <span class="judul">Tahun:</span>
                        <select name="tahun">
                            <?php
                            $already_selected_value = $year;
                            $earliest_year = 1990;
                            foreach (range(date('Y'), $earliest_year) as $x) {
                                print '<option value="'.$x.'"'.($x === $already_selected_value ? ' selected="selected"' : '').'>'.$x.'</option>';
                            }
                            ?>
                        </select>
                        <?php
                        if ($tipe !== 'pc') {
                            echo '<span class="judul">Brand :</span>';
                            echo "<input type='text' name='brand_pc' value=" .$data['brand_pc']. ">";
                        }
                        ?>
                    <span class="judul">Operating System:</span>
                        <input type="text" name="os" id="" value="<?php echo $data['os'] ?>">
                    <span class="judul">Kondisi :</span>
         
                        <select name="kondisi"> 
                            
                            <?php if($kondisi == 'baik'){
                            echo "<option value='baik' selected>Device dalam kondisi baik</option>
                            <option value='kurang'>Device dalam kondisi kurang baik</option>
                            <option value='service'>Device dalam kondisi perbaikan</option>
                            <option value='rusak'>Device rusak</option>";
                            
                            } else if($kondisi == 'kurang'){
                            echo "<option value='baik' >Device dalam kondisi baik</option>
                            <option value='kurang' selected>Device dalam kondisi kurang baik</option>
                            <option value='service'>Device dalam kondisi perbaikan</option>
                            <option value='rusak'>Device rusak</option>";
                            }
                            else if($kondisi == 'service'){
                            echo "<option value='baik' >Device dalam kondisi baik</option>
                            <option value='kurang' >Device dalam kondisi kurang baik</option>
                            <option value='service' selected>Device dalam kondisi perbaikan</option>
                            <option value='rusak'>Device rusak</option>";
                            }
                            else if($kondisi == 'rusak'){
                            echo "<option value='baik' >Device dalam kondisi baik</option>
                            <option value='kurang' >Device dalam kondisi kurang baik</option>
                            <option value='service' >Device dalam kondisi perbaikan</option>
                            <option value='rusak' selected>Device rusak</option>";
                            }
                            ?>  
                            
                        </select>
                    <span class="judul">Keterangan:</span>
                        <textarea name="keterangan" id=""  cols="30" rows="10"><?php echo $data['keterangan'] ?></textarea>
                    <!-- Tambahkan informasi pemilik PC sesuai kebutuhan -->
                    <span class="judul">gambar :</span>
                        <img src="img/<?php echo $data['gambar']; ?>"  class="card-img-top" style="height: 194px; width= 30px;">
                        <input type="file" name="gambar" id="gambar">
                    <!-- <div class="picture-container">
                    
                        <div class="picture">
                            
                            <input type="file" name="gambar" id="fileInput" accept="image/*">
                            <label for="fileInput" class="file-label">
                                <div class="plus-icon">+</div>
                                <img id="pictureImage" src="" alt="" />
                            </label>
                        </div>
                    </div> -->
                    <!-- <div class="file-name-display"></div> -->
                  
                </div>
            </div>
            <div class="card-detail">
                <div class="card-header-detail">
                    <h3 class="card-title">Spesifikasi PC</h3>
                </div>
                <div class="card-body">
                    <span class="judul">Tipe Storage :</span>
                        <select name="tipe_rom" id="">
                            <?php
                                if($rom == "sata"){
                                    echo"
                                    <option value='sata' selected>SATA</option>
                                    <option value='nvme'>NVME</option>
                                    <option value='ide'>IDE</option>";
                                }else if($rom == "nvme"){
                                    echo"
                                    <option value='sata'>SATA</option>
                                    <option value='nvme' selected>NVME</option>
                                    <option value='ide'>IDE</option>";
                                }else if($rom == "ide"){
                                    echo"
                                    <option value='sata'>SATA</option>
                                    <option value='nvme'>NVME</option>
                                    <option value='ide' selected>IDE</option>";
                                }
                            ?>
                        </select>
                    <span class="judul">Size Storage :</span>
                        <input type="text" name="size_rom" id="" value="<?php echo $data['size_rom'] ?>">
                    <span class="judul">Tipe RAM :</span>
                        <input type="text" name="tipe_ram" id="" value="<?php echo $data['tipe_ram'] ?>">
                    <span class="judul">Penyimpanan RAM :</span>
                        <input type="text" name="size_ram" id="" value="<?php echo $data['size_ram'] ?>">
                    <span class="judul">Processor :</span>
                        <input type="text" name="cpu" id="" value="<?php echo $data['cpu'] ?>">
                    <span class="judul">LAN :</span>
                        <select name="lan" id="">
                            <?php
                                if($Lan == "ada"){
                                    echo"
                                    <option value='ada'>ada</option>
                                    <option value='tidak_ada'>tidak_ada</option>";
                                }else if($Lan == "tidak_ada"){
                                    echo"
                                    <option value='tidak_ada'>tidak ada</option>
                                    <option value='ada'>ada</option>";
                                }
                            ?>
                        </select>
                    <span class="judul">Ip LAN:</span>
                        <input type="text" name="ip" id="" value="<?php echo $data['ip'] ?>">
                    <span class="judul">WiFi :</span>
                        <select name="wifi" id="">
                            <?php
                                if($Wifi == "ada"){
                                    echo"
                                    <option value='ada'>ada</option>
                                    <option value='tidak_ada'>tidak_ada</option>";
                                }else if($Wifi == "tidak_ada"){
                                    echo"
                                    <option value='tidak_ada'>tidak ada</option>
                                    <option value='ada'>ada</option>";
                                }
                            ?>
                        </select>
                    <span class="judul">Brand Monitor:</span>
                        <input type="text" name="brand_mo" id="" value="<?php echo $data['brand_mo'] ?>">
                    <span class="judul">Ukuran Layar Monitor:</span>
                        <input type="text" name="ukuran_mo" id="" value="<?php echo $data['ukuran_mo'] ?>">
                    <!-- Tambahkan informasi pemilik PC sesuai kebutuhan -->
                    <br>
                    <button class="btn-ubah" name="submit" type="submit">Ubah</button>
                </div>
            </div>
        </div>
    </div>
</form>






<!-- ============== end tampilan device ============= -->
</section>

  <!-- End Main -->
  <script src="script-dashboard.js"></script>
  


</script>
</body>
</html>
