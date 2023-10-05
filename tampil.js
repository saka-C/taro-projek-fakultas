$(document).ready(function() {
    $.ajax({
        url: "get_nama.php",
        type: "GET",
        dataType: "json",
        success: function(response) {
            $("$nama").text(response.nama);
        },
        error: function() {
            console.log("Terjadi kesalahan saat mengambil nama pengguna.");
        }
    });
});
