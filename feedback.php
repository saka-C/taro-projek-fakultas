<?php
require 'function.php';
$userId = $_SESSION['usere']; 
$pesan = $_POST['pesan'];
$sql = "update treport set pesan= '$pesan' where email = '$userId'";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<script>alert('feedback berhasil, mohon menunggu balasan!');window.location='index.php'</script>";
} else {
    echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
}
?>