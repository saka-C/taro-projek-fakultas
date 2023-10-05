    <?php

    require 'function.php';
        //mengambil data 5 pesan terbaru 
        $sql = mysqli_query($conn, "SELECT Count(id_report) as jumlah FROM treport WHERE date(tanggal) = CURDATE()");
        
        $hasil = mysqli_fetch_array($sql);
        
        //membuat data json
        echo json_encode(array('jumlah' => $hasil['jumlah']));


    ?>