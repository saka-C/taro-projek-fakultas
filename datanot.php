<?php
    
require 'function.php';
    //menghitung jumlah pesan dari tabel pesan
    $query= mysqli_query($conn, "Select Count(id_report) as jumlah From treport");
    
    //menampilkan data
    $hasil = mysqli_fetch_array($query);
    
    //membuat data json
    echo json_encode(array('jumlah' => $hasil['jumlah']));
    
?>