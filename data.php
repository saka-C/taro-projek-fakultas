<?php

require 'function.php';
session_start();
$userId = $_SESSION['usere']; 
    //mengambil data 5 pesan terbaru 
    $sql = mysqli_query($conn, "SELECT * FROM treport inner join akun on treport.email = akun.email inner join tnotifikasi on treport.idnotif = tnotifikasi.idnotif where akun.email = '$userId'");
    
    $notifications = array();
while ($row = mysqli_fetch_assoc($sql)) {
    $notifications[] = $row;
}

$response = array("notifications" => $notifications);
echo json_encode($response);

?>