<?php

require 'function.php';

    //mengambil data 5 pesan terbaru 
    $sql = mysqli_query($conn, "SELECT * FROM tnotifikasi ORDER BY idnotif DESC limit 5");
    
    $notif = array();
while ($row = mysqli_fetch_assoc($sql)) {
    $notif[] = $row;
}

$response = array("notif" => $notif);
echo json_encode($response);

?>