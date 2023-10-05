<?php
require_once 'function.php'; 

 


// Menerima input dari pengguna
$term = $_GET['term'];

// Query untuk mencari saran dari database
$query = "SELECT id_ruang,nama_ruangan FROM ruangan WHERE nama_ruangan LIKE '%$term%'";
$result = $conn->query($query);

// Menyimpan hasil query dalam array
$matches = array();
if($result->num_rows > 0){ 
    while($row = $result->fetch_assoc()){ 
        $data['id'] = $row['id_ruang']; 
        $data['value'] = $row['nama_ruangan']; 
        array_push($matches, $data); 
    } 
} 

// Mengirimkan hasil dalam format JSON
echo json_encode($matches);



?>