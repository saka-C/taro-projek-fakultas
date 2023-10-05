<?php
require 'function.php';
session_start();
$userId = $_SESSION['usere']; 
    //mengambil data 5 pesan terbaru 
    $sql = mysqli_query($conn, "SELECT * FROM treport inner join akun on treport.email = akun.email inner join tnotifikasi on treport.idnotif = tnotifikasi.idnotif inner join ruangan on treport.id_ruang = ruangan.id_ruang where treport.email = '$userId'");
    $data = mysqli_fetch_assoc($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tiket.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Tiket</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    .popup-feedback {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1000;
    }
    .popup-content form{
        width: 100%;
    }
    .popup-content textarea{
        width: 90%;
        resize:vertical;
        min-height: 80px;
        margin-top: 20px;
        border-bottom: 1px solid var(--stroke-color-draken);
        background-color: var(--hover-white-color);
        padding: 10px;
    }
    .popup-content {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: var(--body-color);
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        text-align: center;
        width: 50%;
        max-width: 80%; /* Lebar maksimum popup */
        max-height: 80%; /* Tinggi maksimum popup */
        overflow: auto; /* Tampilkan scrollbar jika kontennya terlalu besar */
    }

    .btn-popup{
        display: flex;
        justify-content: space-around;
        margin-top: 10px;
    }
    .btn-popup button{
        padding: 5px 10px;
        cursor: pointer;
    }
    #close-button-feedback{
        background: none;
        border: none;
    }
    /* Tambahkan gaya responsif */
    @media (max-width: 768px) {
        .popup-content {
            max-width: 90%;
            max-height: 90%;
        }
    }
    </style>
</head>
<body>
    <div class="container">

<!-- ================================ Navbar ======================================
===========================================================================  -->
        <nav class="navbar nav-tiket">
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
                    <a href="#">Laporkan Masalah</a>
                    <a href="#">Contact</a>
                    <div class="drop-prof">
                        
                        <a href="#">Profil</a>
                        <a href="logout.php">Log-out</a>
                    </div>                   
                </div>
                <div class="burger">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
                <div class="profile">
                    <a href="#" id="usernameLink"><h3>Halo, <span id="nama"></span>!</h3></a>
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
                            <a href="#">Log-out</a>
                        </div>
                    </div>
                    <img src="./asset/profil.jpg" alt="">
                </div>
            </div>
            
        </nav>
<!-- ================================ Navbar end ================================
===========================================================================  -->


<!-- ============================ Tiket =================================
===========================================================================  -->
<section id="antrian" >
        </div>
            <div class="ticket-container" >
            <div class="ticket-card">
                        <div class="ticket-header">
                            <span class="ticket-id"><?php echo $data['id_report'] ?></span>
                            <div class="waktu">
                                <span class="ticket-date"><?php echo $data['tanggal'] ?></span>
                            </div>      
                        </div>
                        <div class="ticket-content">
                            <div class="ticket-info">
                                <div class="ticket-staloc">
                                    <h2 class="ticket-name"><?php echo $data['nama'] ?></h2>
                                    <p class="ticket-status">Status: <?php echo $data['pelapor'] ?></p>
                                    <p class="ticket-location">Location: <?php echo $data['nama_ruangan']?></p>
                                </div>
                            </div>
                            <div class="ticket-issue">
                                <p class="issue-text"><?php echo $data['jenis'] ?></p>
                                <span>Pengerjaan: <?php echo $data['status'] ?></span> <br>
                                <span>dikerjakan oleh: <?php echo $data['tenagakerja'] ?></span>
                            </div>
                            <div class="ticket-description">
                                <div class="description-box">
                                <?php echo $data['deskripsi'] ?>
                                </div>
                                <?php if($data['idnotif'] == '4'): ?>
                                    <p>apakah keluhan anda selesai?</p>
                                    <p>konfirmasi:</p>
                                    <button href="feedback.php" class="" id="tombol">belum</button> <br>
                                    <button href="index.php">sudah</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            </div>       
        </div>  

    <div class="popup-feedback" id="popup-feedback">
        <div class="popup-content">
            <h2>Berikan feedback masalah</h2>
          <form action="" method="post">
            <textarea name="pesan" id="" class="post" placeholder="Berikan Feedback👋"></textarea>
            <div class="btn-popup">
              <button id="close-button-feedback">Close</button>
              <button type="submit" name="submit" value="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
      <script>
const tombol = document.getElementById("tombol");
const popupFeedback = document.getElementById("popup-feedback");
const closeButton2 = document.getElementById("close-button-feedback");

  tombol.addEventListener("click", function() {
    popupFeedback.style.display = "block";
  });

  closeButton2.addEventListener("click", function() {
    popupFeedback.style.display = "none";
  });

</script>
</section>

<!-- ============================ end Tiket =================================
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
</body>
</html>