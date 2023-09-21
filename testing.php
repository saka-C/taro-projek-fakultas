<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah ada data yang dikirim
    if (isset($_POST["kode_br"]) && isset($_POST["table"])) {
        // Mendapatkan data yang dikirim
        $kode_br = $_POST["kode_br"];
        $table = $_POST["table"];

        // Sekarang Anda dapat menggunakan $kode_br dan $table sesuai kebutuhan Anda
        // Misalnya, Anda dapat melakukan pengolahan data atau query database di sini
        // ...

        // Contoh: Mencetak data yang diterima
        echo "Kode BR: " . $kode_br . "<br>";
        echo "Table: " . $table . "<br>";
    } else {
        echo "Data tidak lengkap.";
    }
} else {
    echo "Permintaan bukan metode POST.";
}
?>






