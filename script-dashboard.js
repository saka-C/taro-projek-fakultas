// =========================== SIDEBAR JS ===========================
const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      toggle = body.querySelector(".toggle"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


      toggle.addEventListener("click", ()=>{
        sidebar.classList.toggle("close");
      });


// =========================== LOAD JS ===========================


  document.addEventListener("DOMContentLoaded", function() {
    const links = document.querySelectorAll("a.smooth-transition");

    links.forEach(function(link) {
      link.addEventListener("click", function(event) {
        event.preventDefault();

        const targetUrl = link.getAttribute("href");

        // Tambahkan kelas 'fade-out' untuk memulai transisi keluar
        document.body.classList.add("fade-out");

        // Tunggu transisi selesai, kemudian navigasi ke halaman baru
        setTimeout(function() {
          window.location.href = targetUrl;
        }, 200); // Sesuaikan waktu transisi dengan waktu CSS (0.4s)
      });
    });
  });


// =========================== SELESAI JS ===========================


  function showDetail(name, status, kendala, lokasi, ruangan) {
    const popupDetail = document.getElementById('popupDetail');
    popupDetail.innerHTML = `
      Detail Informasi:<br>
      Nama: ${name}<br>
      Status: ${status}<br>
      Kendala: ${kendala}<br>
      Lokasi Gedung: ${lokasi}<br>
      Ruangan: ${ruangan}
    `;

    const popup = document.getElementById('popup');
    popup.style.display = 'block';
  }

  function closePopup() {
    const popup = document.getElementById('popup');
    popup.style.display = 'none';
  }


  function submitForm(event) {
    event.preventDefault();
    const namaTenagaKerja = document.getElementById('namaTenagaKerja').value;
    if (namaTenagaKerja) {
      alert(`Kendala akan ditangani oleh: ${namaTenagaKerja}`);
      closePopup();
    }
  }


  const showPopupBtn = document.getElementById("showPopupBtn");
  const closePopupBtn = document.getElementById("closePopupBtn");
  const popupContainer = document.getElementById("popupContainer");
  const feedbackForm = document.getElementById("feedbackForm");
  
  showPopupBtn.addEventListener("click", () => {
    popupContainer.style.display = "flex";
  });
  
  closePopupBtn.addEventListener("click", () => {
    popupContainer.style.display = "none";
  });
  
  feedbackForm.addEventListener("submit", (event) => {
    event.preventDefault();
    const feedback = document.getElementById("feedback").value;
    // Lakukan sesuatu dengan feedback, misalnya kirim ke server atau tampilkan pesan.
    console.log("Feedback:", feedback);
    popupContainer.style.display = "none";
  });
  

