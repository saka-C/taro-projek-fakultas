<?php
require_once 'koneksi.php'; 

 


// Menerima input dari pengguna
$term = $_GET['term'];

// Query untuk mencari saran dari database
$query = "SELECT id_ruang ,ruang FROM ruang WHERE ruang LIKE '%$term%'";
$result = $db->query($query);

// Menyimpan hasil query dalam array
$matches = array();
if($result->num_rows > 0){ 
    while($row = $result->fetch_assoc()){ 
        $data['id'] = $row['id_ruang']; 
        $data['value'] = $row['ruang']; 
        array_push($matches, $data); 
    } 
} 

// Mengirimkan hasil dalam format JSON
echo json_encode($matches);



?>