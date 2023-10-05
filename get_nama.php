<?php
session_start();

if (isset($_SESSION['user1'])) {
    $username = $_SESSION['user1'];
} else {
    $username = "Pengguna Tidak Ditemukan";
}

echo json_encode(array("username" => $username));
?>
