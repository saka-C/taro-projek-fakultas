<?php

require 'function.php';
    //mengambil data 5 pesan terbaru 
    $sql = mysqli_query($conn, "SELECT Count(id_report) as selesai FROM treport inner join tnotifikasi on treport.idnotif = tnotifikasi.idnotif where treport.idnotif = '4' ORDER BY id_report ");
    
    $hasil = mysqli_fetch_array($sql);
    
    //membuat data json
    echo json_encode(array('selesai' => $hasil['selesai']));


?>