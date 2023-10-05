<?php
require 'function.php';

    //mengambil data 5 pesan terbaru 
    $sql = mysqli_query($conn, "SELECT * FROM treport inner join tnotifikasi on treport.idnotif = tnotifikasi.idnotif  inner join ruangan on treport.id_ruang = ruangan.id_ruang where treport.idnotif = '4' ORDER BY id_report ");
    
    $history = array();
while ($row = mysqli_fetch_assoc($sql)) {
    $history[] = $row;
}

$response = array("history" => $history);
echo json_encode($response);

?>