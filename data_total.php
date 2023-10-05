<?php

require 'function.php';
    //mengambil data 5 pesan terbaru 
    $sql = mysqli_query($conn, "SELECT Count(id_report) as total FROM treport");
    
    $hasil = mysqli_fetch_array($sql);
    
    //membuat data json
    echo json_encode(array('total' => $hasil['total']));


?>