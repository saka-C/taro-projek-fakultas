$(document).ready(function() {
    function loadHistory() {
        $.ajax({
            url: "datahistori.php",
            type: "GET",
            dataType: "json",
            success: function(response) {
                $("#history").text(response.history.length);

                // Kosongkan kontainer noti fikasi
                $(".notification-list").empty();

                // Iterasi melalui setiap notifikasi dan tambahkan ke kontainer
                response.history.forEach(function(history, index) {
                    var newHistory = $("<div>").addClass("notification-card done");
                    newHistory.html(`
                        <div class="notification-no no-done">${history.id_report}</div>
                        <div class="short">
                            <div class="notification-name">${history.nama}</div>
                            <div class="notification-info">${history.nama_ruangan} || ${history.gedung}</div>
                        </div>
                        <div class="notification-actions selesai">
                            <a href="">Lihat laporan</a>
                        </div>
                    `);
                    $(".notification-list").append(newHistory);
                }); 
            },
            error: function() {
                console.log("Terjadi kesalahan saat memuat notifikasi pesan.");
            }
        });
    }

    // Memuat notifikasi pesan saat halaman dimuat
    loadHistory();

    // Menjalankan fungsi loadhistory setiap beberapa detik
    setInterval(loadHistory, 5000); // Misalnya, setiap 5 detik
});