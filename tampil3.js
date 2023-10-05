$(document).ready(function() {
    function loadNotifications() {
        $.ajax({
            url: "data_notif.php",
            type: "GET",
            dataType: "json",
            success: function(response) {
                $("#notif").text(response.notifications.length);

                // Dapatkan referensi ke tbody dari tabel notifikasi
                var tbody = $("#notification-table tbody");

                // Kosongkan tbody dari tabel notifikasi
                tbody.empty();

                // Iterasi melalui setiap notifikasi dan tambahkan ke tabel
                response.notifications.forEach(function(notification, index) {
                    var newRow = `
                        <tr>
                            <td>${notification.id_report}</td>
                            <td>${notification.nama}</td>
                            <td>${notification.pelapor}</td>
                            <td>${notification.nama_ruangan}</td>
                            <td>${notification.jenis}</td>
                            <td>${notification.deskripsi}</td>
                            <td>${notification.tanggal}</td> 
                            <td>
                                <div class="notification-actions">
                                    <a href="updatedata.php?id_report=${notification.id_report}">confirm</a>
                                </div>
                            </td>
                        </tr>
                    `;
                    tbody.append(newRow);
                });
                
            },
            error: function() {
                console.log("Terjadi kesalahan saat memuat notifikasi.");
            }
        });
    }

    // Memuat notifikasi saat halaman dimuat
    loadNotifications();

    // Menjalankan fungsi loadNotifications setiap beberapa detik
    setInterval(loadNotifications, 5000); // Misalnya, setiap 5 detik

    // Fungsi untuk menangani notifikasi
   
});
