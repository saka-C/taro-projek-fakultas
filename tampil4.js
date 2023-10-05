$(document).ready(function() {
    function loadNotifications() {
        $.ajax({
            url: "data_notiftampil.php",
            type: "GET",
            dataType: "json",
            success: function(response) {
                $("#notif").text(response.notifications.length);

                // Kosongkan kontainer noti fikasi
                $(".notification-list").empty();

                // Iterasi melalui setiap notifikasi dan tambahkan ke kontainer
                response.notifications.forEach(function(notification, index) {
                    var newNotification = $("<div>").addClass("notification-card");
                    newNotification.html(`
                        <div class="notification-no">${notification.id_report}</div>
                        <div class="short">
                            <div class="notification-name">${notification.nama}</div>
                            <div class="notification-info">${notification.lokasi} || ${notification.posisi}</div>
                        </div>
                        <div class="notification-actions">
                            <button class="btn-tangani" onclick="showDetail('${notification.nama}', '${notification.pelapor}', '${notification.jenis}', '${notification.lokasi}', '${notification.posisi}')">Tangani</button>
                        </div>
                    `);
                    $(".notification-list").append(newNotification);
                }); 
            },
            error: function() {
                console.log("Terjadi kesalahan saat memuat notifikasi pesan.");
            }
        });
    }

    // Memuat notifikasi pesan saat halaman dimuat
    loadNotifications();

    // Menjalankan fungsi loadNotifications setiap beberapa detik
    setInterval(loadNotifications, 5000); // Misalnya, setiap 5 detik
});