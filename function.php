<?php
date_default_timezone_set('Asia/Jakarta');
$conn = mysqli_connect("localhost","root","","ticketing");

function query($request) {
    global $conn;

    $req = mysqli_query($conn,$request);

    $res = [];

    foreach($req as $r){
        $res[] = $r;
    }

    return $res;
}

// function signUp($data){
//     global $db;
//     $email = $data['email'];
//     $nama =$data['nama'];
//     $password =$data['password'];
//     $sql = "INSERT INTO akun values('', '$nama', '$email', '$password', '1')";
//     mysqli_query($db, $sql);
//     return mysqli_affected_rows($db);
// }

// function regis($data){
//     global $conn;

//     $nama = $data['nama'];
//     $email = $data['email'];
//     $password = $data['password'];
//     $status = $data['status'];

//     mysqli_query($conn,"INSERT INTO akun VALUES (NULL, '$nama', '$email', '$password', '$status')");
//     return mysqli_affected_rows($conn);
// }


function inputreport($data){
    global $conn;
    $email = $data['email'];
    $pelapor = $data['pelapor'];
    $nama = $data['nama'];   
    $idruang = $data['id_ruang'];
    $jenis = $data['jenis'];
    $deskripsi = $data['deskripsi'];
    $waktu = new DateTime();
    $format_waktu = $waktu->format('Y-m-d H:i:s');
    // $timestamp = date("Y-m-d H:i:s");
    // $waktu = new DateTime($timestamp);

    mysqli_query($conn,"INSERT INTO `treport`( `email`, `pelapor`,  `nama`, `id_ruang`, `jenis`,`deskripsi`, `idnotif`, `tenagakerja`, `tanggal`) VALUES ('$email','$pelapor','$nama','$idruang','$jenis','$deskripsi','1', '-', '$format_waktu')");
    
}

function no_resubmit(){
    ?>

        <script>
                if ( window.history.replaceState ) {
                            window.history.replaceState( null, null, window.location.href );
                    }
        </script>

    <?php 
}
// function apaua($data){
//     global $conn;

//     $judul = $data['judul'];
//     $pengarang = $data['pengarang'];
//     $th_terbit = $data['th_terbit'];
//     $jenis_buku = $data['jenis_buku'];
//     $status = $data['status'];

//     mysqli_query($conn, "INSERT INTO `tb_buku` (`no_buku`, `judul`, `pengarang`, `th_terbit`, `jenis_buku`, `status`) VALUES (NULL, '$judul', '$pengarang', '$th_terbit', '$jenis_buku', '$status')");

//     return mysqli_affected_rows($conn);

// }

// function hapusAnggota($id_anggota){
//     global $conn;

//     $data = query("SELECT * FROM `tb_anggota` WHERE id_anggota = '$id_anggota'");

//     if(!$data){
//         return false;
//     }

//     mysqli_query($conn, "DELETE FROM `tb_anggota` WHERE id_anggota = '$id_anggota'");

//     return mysqli_affected_rows($conn);

// }

// function hapusBuku($no_buku){
//     global $conn;

//     $data = query("SELECT * FROM `tb_buku` WHERE `no_buku` = '$no_buku'");

//     if(!$data){
//         return false;
//     }

//     mysqli_query($conn, "DELETE FROM `tb_buku` WHERE `no_buku` = '$no_buku'");

//     return mysqli_affected_rows($conn);

// }

// function updateAnggota($data){
//     global $conn;

//     $id_anggota = $data['id_anggota'];
//     $nama = $data['nama'];
//     $alamat = $data['alamat'];
//     $kota = $data['kota'];
//     $no_telp = $data['no_telp'];
//     $tgl_lahir = $data['tgl_lahir'];

//     mysqli_query($conn,"UPDATE `tb_anggota` SET `nama` = '$nama', `alamat` = '$alamat', `kota` = '$kota', `no_telp` = '$no_telp', `tgl_lahir` = '$tgl_lahir'  WHERE `tb_anggota`.`id_anggota` = '$id_anggota'");

//     return mysqli_affected_rows($conn);
// }

// function updateBuku($data){
//     global $conn;

//     $no_buku = $data['no_buku'];
//     $judul = $data['judul'];
//     $pengarang = $data['pengarang'];
//     $th_terbit = $data['th_terbit'];
//     $jenis_buku = $data['jenis_buku'];
//     $status = $data['status'];

//     mysqli_query($conn, "UPDATE `tb_buku` SET  `judul` = '$judul', `pengarang` = '$pengarang', `th_terbit` = '$th_terbit', `jenis_buku` = '$jenis_buku',  `status` = '$status' WHERE `tb_buku`.`no_buku` = $no_buku");

//     return mysqli_affected_rows($conn);   
// }

// function pinjamBuku($data){
//     global $conn;

//     $id_anggota = $data['id_anggota'];
//     $no_buku = $data['no_buku'];
//     $date_now = date('d-M-y');

//     mysqli_query($conn, "INSERT INTO `tb_pinjam` (`no_pinjam`, `id_anggota`, `no_buku`, `tgl_pinjam`, `tgl_kembali`) VALUES (NULL, '$id_anggota', '$no_buku', '$date_now')");

//     return mysqli_affected_rows($conn);
// }