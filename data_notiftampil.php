<?php
require 'function.php';

    //mengambil data 5 pesan terbaru 
    $sql = mysqli_query($conn, "SELECT * FROM treport inner join tnotifikasi on treport.idnotif = tnotifikasi.idnotif inner join ruangan on treport.id_ruang = ruangan.id_ruang where treport.idnotif = '2' ORDER BY id_report DESC limit 5 ");
    
    $notifications = array();
while ($row = mysqli_fetch_assoc($sql)) {
    $notifications[] = $row;
}

$response = array("notifications" => $notifications);
echo json_encode($response);

?>