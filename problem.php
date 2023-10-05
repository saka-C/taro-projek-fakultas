<?php
session_start();
require 'function.php';

if (!isset($_SESSION['useru'])) {
    header("Location: index.php");
}
no_resubmit();
if(isset($_POST['submit'])){
    if(inputreport($_POST) > 0){
      
    }
    echo "<script>alert('berhasil melaporkan keluhan!');window.location='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="problem.css">
    <title>Laporan masalah</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#autocomplete").autocomplete({
                source: "fetch.php",
                select: function(event, ui) {
                    // Set the selected item's ID as the value of the hidden input field
                    $("#selectedItemId").val(ui.item.id);
                }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <div class="logo">
                <img src="./asset/logoui.png" alt="Logo">
                <div class="logo-text">
                    <span class="logo-name"><a href="#">Fakultas</a></span>
                    <span class="logo-profession"><a href="#">Psikologi</a></span>
                </div>
            </div>
            <div class="navbar-center">
                <a href="#">Inventory</a>
                <a href="#">Contact</a>
                <a href="#" id="usernameLink"><h4>Halo <span id="nama"></span></h4></a>
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
            </div>
        </nav>

        
        <div class="dashboard">
            <div class="content">
                <div class="form-container">
                    <form action="problem.php" method="POST" >
                        <div class="input-group">
                            <label></label>
                            <br>
                            <input type="email" id="email" name="email" value="<?php echo $_SESSION['usere']; ?>" hidden>
                        </div>
                        <div class="input-group">
                            <label></label>
                            <br>
                            <input type="text" id="pelapor" name="pelapor" value="<?php echo $_SESSION['useru']; ?>" hidden>
                        </div>

                        <div class="input-group">
                            <label></label>
                            <br>
                            <input type="text" id="nama" name="nama" value="<?php echo $_SESSION['user1']; ?>" required hidden>
                        </div>
                        <h2>Silahkan Isi Form Masalah</h2>

                        <div class="form-group">
                          <label for="id_ruang">pilih ruangan</label>
                            <div class="lokasi">
                            <input type="text" name="" id="autocomplete" >
                            <input type="hidden" name="id_ruang" id="selectedItemId" value="">            
                            </div>
                        </div>
                                
                        

                        <!-- <div class="form-group">
                          <label for="lokasi">pilih lokasi</label>
                          <div class="lokasi">
                                <select name="lokasi" id="lokasi">
                                    <option disabled selected value> Lokasi </option>
                                    <option value="gedung a">gedung a</option>
                                    <option value="gedung b">gedung b</option>
                                    <option value="gedung c">gedung c</option>
                                    <option value="gedung d">gedung d</option>
                                    <option value="gedung e">gedung e</option>
                                    <option value="gedung f">gedung f</option>
                                    <option value="gedung g">gedung g</option>
                                    <option value="gedung h">gedung h</option>
                                </select>
                                <select name="lantai" id="lantai" >
                                    <option disabled selected value> Lantai </option>
                                </select>
                                <select name="kelas" id="kelas" >
                                    <option disabled selected value>kelas</option>
                                </select>
                          </div>
                        </div> -->
                        <div class="form-group">
                          <label for="status">Jenis Masalah</label>
                          <div class="masalah">
                            <select name="jenis" id="jenis" >
                                <option disabled selected value>silahkan pilih jenis masalah anda</option>
                                <option value="Masalah Jaringan">Masalah Jaringan</option>
                                <option value="Device Mati">Device Mati</option>
                                <option value="Masalah Perangkat">Masalah Perangkat</option>
                                <option value="Masalah Device Non PC">Masalah Device Non PC</option>
                            </select>
                          </div>                          
                        </div>
                        <div class="form-group">
                          <label for="kendala">Kendala:</label>
                          <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" ></textarea>
                        </div>

                  
                        <div class="input-group">
                            <button type="submit" value="submit" name="submit" class="btn">laporkan</button>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div>
    <script>
        document.getElementById('lokasi').addEventListener('change', function () {
    var lokasi = this.value;
    var lantaiSelect = document.getElementById('lantai');
    var kelasSelect = document.getElementById('kelas');

    lantaiSelect.innerHTML = '<option disabled selected value> Lantai </option>';
    kelasSelect.innerHTML = '<option disabled selected value>kelas</option>';

    var lantaiOptions = {
        'gedung a': 2, 
        'gedung b': 2, 
        'gedung d': 2, 
        'gedung e': 2, 
        'gedung f': 2, 
        'gedung g': 2, 
        'gedung c': 3, 
        'gedung h': 3
    };

    if (lantaiOptions.hasOwnProperty(lokasi)) {
        lantaiSelect.style.display = 'block';
        kelasSelect.style.display = 'block';

        var numLantai = lantaiOptions[lokasi];
        for (var i = 1; i <= numLantai; i++) {
            var option = document.createElement('option');
            option.text = 'lantai ' + i;
            option.value = 'lantai ' + i;
            lantaiSelect.add(option);
        }
    } else {
        lantaiSelect.style.display = 'none';
        kelasSelect.style.display = 'none';
    }
});

document.getElementById('lantai').addEventListener('change', function () {
    var lokasi = document.getElementById('lokasi').value;
    var lantai = this.value;
    var kelasSelect = document.getElementById('kelas');

    kelasSelect.innerHTML = '<option disabled selected value>kelas</option>';

    var kelasOptions = {
        'gedung a-lantai 1': ['A-101', 'A-102', 'A-103', 'A-104'],
        'gedung a-lantai 2': ['A-201', 'A-202', 'A-203', 'A-204'],
        'gedung b-lantai 1': ['B-101', 'B-102', 'B-103', 'B-104'],
        'gedung b-lantai 2': ['B-201', 'B-202', 'B-203', 'B-204'],
        'gedung c-lantai 1': ['C-101', 'C-102', 'C-103', 'C-104'],
        'gedung c-lantai 2': ['C-201', 'C-202', 'C-203', 'C-204'],
        'gedung c-lantai 3': ['C-301', 'C-302', 'C-303', 'C-304'],
        'gedung d-lantai 1': ['D-101', 'D-102', 'D-103', 'D-104'],
        'gedung d-lantai 2': ['D-201', 'D-202', 'D-203', 'D-204'],
        'gedung e-lantai 1': ['E-101', 'E-102', 'E-103', 'E-104'],
        'gedung e-lantai 2': ['E-201', 'E-202', 'E-203', 'E-204'],
        'gedung f-lantai 1': ['F-101', 'F-102', 'F-103', 'F-104'],
        'gedung f-lantai 2': ['F-201', 'F-202', 'F-203', 'F-204'],
        'gedung g-lantai 1': ['G-101', 'G-102', 'G-103', 'G-104'],
        'gedung g-lantai 2': ['G-201', 'G-202', 'G-203', 'G-204'],
        'gedung h-lantai 1': ['H-101', 'H-102', 'H-103', 'H-104'],
        'gedung h-lantai 2': ['H-201', 'H-202', 'H-203', 'H-204'],
        'gedung h-lantai 3': ['H-301', 'H-302', 'H-303', 'H-304']
    };

    var key = lokasi + '-' + lantai;
    if (kelasOptions.hasOwnProperty(key)) {
        kelasSelect.style.display = 'block';
        var classes = kelasOptions[key];
        classes.forEach(function (className) {
            var option = document.createElement('option');
            option.text = className;
            option.value = className;
            kelasSelect.add(option);
        });
    }
});     

    </script>
    <footer>
        <div class="footer">
            <div class="footer-logo">
                <img src="./asset/logoui.png" alt="Logo">
                <div class="logo-text">
                    <span class="logo-name">Tim IT</span>
                    <span class="logo-profession">Fakultas Psikologi</span>
                </div>
            </div>
            <div class="footer-credits">
                <p>Shaka Aufa,Renaldi Aditya,Rafli Febrian & All IT support </p>
            </div>
            <div class="footer-copyright">
                <p>&copy; 2023 Fpsi UI. All rights reserved.</p>
            </div>
        </div>
    </footer>


<script src="scriptt.js"></script>
</body>
</html>