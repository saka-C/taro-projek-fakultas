<?php
session_start();
require 'function.php';
if (isset($_GET['id_report'])) {
    $nama = $_SESSION['user1'];

    $id_report = mysqli_real_escape_string($conn, $_GET['id_report']);
    $sql = "update treport set idnotif= '2', tenagakerja='$nama' where id_report = '$id_report'";
    $result = mysqli_query($conn, $sql);
    if($result === true){
        echo "<script>alert('pengaduan dikerjakan, semangat');window.location='dashboard.php'</script>";
    }
}

?>