<?php
include 'koneksi.php';
require 'functions.php';
if(isset($_POST['submit'])){
    // var_dump($_POST);
    if(tambahPC($_POST) > 0){
        echo "<script> alert('berhasil tambah device'); window.location='tambah-data.html' </script>";
      }else{
        echo "<script> alert('gagal tambah device');  window.location='IAadd-pc.php' </script> ";
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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <title>Tmabah PC</title>
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
                    
                    <span class="judul">Ruang :</span>
                        <input type="text" name="" id="autocomplete" >
                        <input type="hidden" name="id_ruang" id="selectedItemId" value="">            
                    <span class="judul">Kode Barang :</span>
                        <input type="text"  name="kode_br" autocomplete="off" placeholder="hanya angka max 10"> 
                    <span class="judul">Tipe Device :</span>
                        <select name="tipe" id="tipe">
                            <option disabled selected value>pilih tipe device</option>
                            <option value="laptop">LAPTOP</option>
                            <option value="pc">PC</option>
                            <option value="all-in-one">ALL IN ONE</option>
                        </select>
                        <span class="judul">Unit :</span>
                        <select name="unit">
                            <option disabled selected value>pilih unit sesuai gedung</option>
                            <option value="public">public</option>
                            <?php
                            include "koneksi.php";
                            $sql = mysqli_query($db, "SELECT * FROM unit");
                            while($data = mysqli_fetch_array($sql)){
                            echo " <option value=$data[unit]>$data[unit]</option>";
                            }
                            ?>
                        </select>
                    <span class="judul">Pemilik :</span>
                        <input type="text"  name="nama_u" placeholder="tulis nama pengguna" autocomplete="off">
                    <span class="judul">Nama Komputer:</span>
                        <input type="text"  name="nama_pc" placeholder="tulis nama komputer" autocomplete="off">
                    <span class="judul">Tahun:</span>
                        <select name="tahun">
                            <?php
                            $already_selected_value = 2000;
                            $earliest_year = 1990;
                            foreach (range(date('Y'), $earliest_year) as $x) {
                                print '<option value="'.$x.'"'.($x === $already_selected_value ? ' selected="selected"' : '').'>'.$x.'</option>';
                            }
                            ?>
                        </select>
                    <span class="judul" id="brand_m">Brand CPU:</span>
                        <input type="text"  name="brand_pc" id="brand"  placeholder="nama brand device " autocomplete="off">
                    <span class="judul">Operating System:</span>
                        <input type="text"  name="os" placeholder="Contoh Windows 10 Profesional (x64)" autocomplete="off">
                    <span class="judul">Kondisi :</span>
                        <select name="kondisi" id="kondisi">
                            <option disabled selected value>pilih kondisi device</option>
                            <option value="baik">Device dalam kondisi baik</option>
                            <option value="kurang">Device dalam kondisi kurang baik</option>
                            <option value="service">Device dalam kondisi perbaikan</option>
                            <option value="rusak">Device rusak</option>
                        </select>
                    <span class="judul" id="keterangan">Keterangan:</span>
                    <textarea name="keterangan" id="input_keterangan" cols="30" rows="10"></textarea>
                    <!-- Tambahkan informasi pemilik PC sesuai kebutuhan -->
                    <div class="picture-container">
                        <div class="picture">
                            <input type="file" name="gambar" id="fileInput" accept="image/*">
                            <label for="fileInput" class="file-label">
                                <div class="plus-icon">+</div>
                                <img id="pictureImage" src="#" alt="" />
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-detail">
                <div class="card-header-detail">
                    <h3 class="card-title">Spesifikasi PC</h3>
                </div>
                <div class="card-body">
                    <span class="judul">Tipe Storage :</span>
                        <select name="tipe_rom">
                            <option disabled selected value>pilih tipe storage</option>
                            <option value="sata">SATA</option>
                            <option value="nvme">NVME</option>
                            <option value="ide">IDE</option>
                        </select>
                    <span class="judul">Size Storage :</span>
                        <input type="text"  name="size_rom" autocomplete="off">
                    <span class="judul">Tipe RAM :</span>
                        <input type="text"  name="tipe_ram" placeholder="contoh DDR5 4800 Mhz sodimm " autocomplete="off">
                    <span class="judul">Penyimpanan RAM :</span>
                        <input type="text"  name="size_ram" placeholder="contoh 16GB dual channel atau 8GB single channel" autocomplete="off">
                    <span class="judul">Processor :</span>
                        <input type="text"  name="cpu" placeholder="Contoh Intel Core i7-2600KF" autocomplete="off">
                    <span class="judul">LAN :</span>
                        <select name="lan">
                            <option value="ada">Ada</option>
                            <option value="tidak_ada">Tidak ada</option>
                        </select>
                    <span class="judul">Ip LAN:</span>
                        <input type="text"  name="ip" autocomplete="off">
                    <span class="judul">WiFi :</span>
                        <select name="wifi">
                            <option value="ada">Ada</option>
                            <option value="tidak_ada">Tidak ada</option>
                        </select>
                    <span class="judul" id="monir">Brand Monitor:</span>
                        <input type="text"  name="brand_mo" id="moni" autocomplete="off">
                    <span class="judul">Ukuran Layar Monitor:</span>
                        <input type="text"  name="ukuran_mo" placeholder="contoh 17 inch" autocomplete="off">
                    <!-- Tambahkan informasi pemilik PC sesuai kebutuhan -->
                    <br>
                    <button class="btn-ubah" name="submit" type="submit">tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>






<!-- ============== end tampilan device ============= -->
</section>

  <!-- End Main -->
  <script src="script-dashboard.js"></script>
  <script>
    document.getElementById('tipe').addEventListener('change', function() {
    var tipe = this.value;
    var labelNama = document.getElementById('brand_m');
    var inputBrand = document.getElementById('brand');
    var labelMonir = document.getElementById('monir');
    var inputMoni = document.getElementById('moni');

    if(tipe === 'pc'){
        labelNama.style.display = "none";
        inputBrand.style.display = "none";
        labelMonir.style.display = "block";
        inputMoni.style.display = "block";
        inputBrand.value = 'pc'; // Set value to 'pc' when the type is 'pc'
    } else {
        labelNama.style.display = "block";
        inputBrand.style.display = "block";
        labelMonir.style.display = "none";
        inputMoni.style.display = "none";
        inputMoni.value = "non-pc"
        inputBrand.value = ''; // Reset value when the type is not 'pc'
    }
    });
    
    </script>
  <script>
    document.getElementById('kondisi').addEventListener('change', function() {
    var kondisi = this.value;
    var span = document.getElementById('keterangan');
    var textarea = document.getElementById('input_keterangan');

    if(kondisi === 'baik'){
        span.style.display = "none";
        textarea.style.display = "none";
        textarea.value = 'tidak ada'; // Set value to 'pc' when the type is 'pc'
    } else {
        span.style.display = "block";
        textarea.style.display = "block";
        textarea.value = ''; // Reset value when the type is not 'pc'
    }
});
  </script>

  <script>
    const fileInput = document.getElementById("fileInput");
    const profileImage = document.getElementById("pictureImage");
    const profilePicture = document.querySelector(".picture");
    const plusIcon = document.querySelector(".plus-icon");

    fileInput.addEventListener("change", (event) => {
    const selectedFile = event.target.files[0];
    if (selectedFile) {
        const reader = new FileReader();
        reader.onload = (e) => {
        profileImage.src = e.target.result;
        profilePicture.classList.add("has-image");
        profilePicture.classList.add("has-dashed");
        plusIcon.style.display = "none";

        };
        reader.readAsDataURL(selectedFile);
    } else {
        profileImage.src = "";
        profilePicture.classList.remove("has-image");
        profilePicture.classList.remove("has-dashed");
        plusIcon.style.display = "block";
    }
    });
  </script>
</body>
</html>
