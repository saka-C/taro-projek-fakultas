<?php

function regis($data){
    require 'function.php';
    if (isset($data['submit'])) {
        $email = $data['email'];
        $password = md5($data['password']);
        $cpassword = md5($data['cpassword']);
        
     
        if ($password == $cpassword) {
            $sql = "SELECT * FROM akun WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO akun (email, nama, password, status)
                VALUES ('$email','p', '$password', 'kosong')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('Selamat, registrasi berhasil!');window.location='login.php'</script>";
                    $email = "";
                    $data['password'] = "";
                    $data['cpassword'] = "";
                } else {
                    echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
                }
            } else {
                echo "<script>alert('EMAIL TIDAK BISA DIDAFTAR 2 KALI.')</script>";
            }
             
        } else {
            echo "<script>alert('Password Tidak Sesuai')</script>";
        }
    }
}

function login($data){
    
    require 'function.php';
    if (isset($data['submit'])) {
        $email = $data['email'];
        $password = md5($data['password']);
        
        $sql = "SELECT * FROM akun WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        
        if ($result && $result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            
            
            $status = $row['status'];
            
            if ($status === 'mahasiswa') {
                $_SESSION['useru'] = $status; 
                $_SESSION['usere'] = $row['email'];// Atur sesuai dengan role yang sesuai (misal: 'user', 'mahasiswa')
                $_SESSION['user1'] = $row['nama'];
                echo "<script>alert('Login berhasil');window.location='index.php'</script>";
            } else if ($status === 'dosen') {
                $_SESSION['useru'] = $status;
                $_SESSION['usere'] = $row['email']; // Atur sesuai dengan role yang sesuai (misal: 'admin')
                $_SESSION['user1'] = $row['nama'];
                echo "<script>alert('Login berhasil ');window.location='index.php'</script>";
            } else if ($status === 'pegawai') {
                $_SESSION['useru'] = $status; 
                $_SESSION['usere'] = $row['email'];// Atur sesuai dengan role yang sesuai (misal: 'admin')
                $_SESSION['user1'] = $row['nama'];
                echo "<script>alert('Login berhasil ');window.location='index.php'</script>";
            } else if ($status === 'admin') {
                $_SESSION['usera'] = $status; 
                $_SESSION['usere'] = $row['email'];// Atur sesuai dengan role yang sesuai (misal: 'admin')
                $_SESSION['user1'] = $row['nama'];
                echo "<script>alert('Login berhasil ');window.location='dashboard.php'</script>";
            } else if ($status === 'kosong') {
                $_SESSION['useru'] = $_SESSION['usernew'];
                $_SESSION['usernew'] = $row['email']; // Atur sesuai dengan role yang sesuai (misal: 'user', 'mahasiswa')
                $_SESSION['user1'] = $row['nama'];
                echo "<script>alert('Login berhasil, silahkan lengkapkan profil anda');window.location='profile.php'</script>";
            }else {
                echo "<script>alert('Status tidak dikenali');window.location='login.php'</script>";
            }
        } else {
            echo "<script>alert('Email atau password salah');window.location='login.php'</script>";
        }
    }
}

function profile($data){
    require 'function.php';
    if (isset($data['submit'])) {
        $email = $_SESSION['usernew'];
        $nama = $data['nama'];
        $status = $data['status'];
        
        $sql = "update akun set nama= '$nama', status='$status' where email = '$email'";
        $result = mysqli_query($conn, $sql);
       
        
        if ($result) {
            $sql1 = "SELECT * FROM akun WHERE status='$status'";
            $result1 = mysqli_query($conn, $sql1);
            if ($result1->num_rows > 0) {
                $row = mysqli_fetch_assoc($result1);
                $status = $row['status'];
                
                if ($status == 'dosen') { 
                    $_SESSION['useru'] = 'dosen';
                    $_SESSION['usernew'] = $_SESSION['useru'];
                    $_SESSION['user1'] = $row['nama'];
                    echo "<script>alert('verikasi akun selesai ');window.location='index.php'</script>";
                } else  if ($status == 'mahasiswa') { 
                    $_SESSION['useru'] = 'mahasiswa';
                    $_SESSION['usernew'] = $_SESSION['useru'];
                    $_SESSION['user1'] = $row['nama'];
                    echo "<script>alert('verikasi akun selesai ');window.location='index.php'</script>";
                } else  if ($status == 'pegawai') { 
                    $_SESSION['useru'] = 'pegawai';
                    $_SESSION['usernew'] = $_SESSION['useru'];
                    $_SESSION['user1'] = $row['nama'];
                    echo "<script>alert('verikasi akun selesai ');window.location='index.php'</script>";
                } else {
                    echo "<script>alert('Status tidak dikenali');window.location='login.php'</script>";
                }
            } else {
                echo "<script>alert('Email atau password salah');window.location='login.php'</script>";
            }
        }
    }
}
function lupapw($data){
    require 'function.php';
    if (isset($data['submit'])) {
        $email = $data["email"];
    
        // Periksa apakah email ada di database
        $sql = "SELECT * FROM akun WHERE email = '$email'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            // Email ditemukan, Anda dapat mengirim email reset password di sini
            // Contoh: Kirim email dengan link reset password ke email pengguna
            // ...
            $_SESSION['userpw'] = $email; 
            echo "<script>alert('email telah ditemukan ');window.location='pwbaru.php'</script>";
        } else {
            echo "<script>alert('email tidak ditemukan ');</script>";
        }
    }
    
}
function pwbaru($data){
    require 'function.php';
    if (isset($data['submit'])) {
        $email = $data["email"];
        $password = md5($data['password']);
    
        // Update password baru di database
        $sql = "UPDATE akun SET password = '$password' WHERE email = '$email'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('password telah direset! ');window.location='login.php'</script>";
            session_destroy();
        } else {
            echo "Error: " . $conn->error;
        }
    }
    
}

function updatestatus($datas) {
    require 'function.php';
    
    if (isset($datas['submit'])) {
        $nama = $_SESSION['user1'];
        $id_report = $datas['id_report'];
        
        $sql = "update treport set idnotif= '2', tenagakerja='$nama' where id_report = '$id_report'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('pengaduan dikerjakan, semangat');</script>";
        }
         
    }
}

function tiket($data){
    require 'function.php';
    if (isset($data['id_report'])) {
        $id_report = $data['id_report'];
        $idnotif = $data['idnotif'];
        $_SESSION['idnotif'] = $idnotif;
        $sql1 = "SELECT * FROM treport WHERE id_report=$id_report";
        $result1 = mysqli_query($conn, $sql1);
        if ($result1->num_rows > 0) {
            $row = mysqli_fetch_assoc($result1);
            $idnotif = $row['idnotif'];
            if($idnotif == 4){
                $_SESSION['idnotif'] = $row['idnotif'];
            }
        }
        
    }
    
}

?>