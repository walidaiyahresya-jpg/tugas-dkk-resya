document.getElementById("sapaForm").addEventListener("submit", function(event) {
    // Mencegah halaman agar tidak reload otomatis
    event.preventDefault();

    // Mengambil nilai teks dari input
    const namaBaru = document.getElementById("profilResya").value;

    // Menampilkan pesan hasil sapa
    document.getElementById("hasilSapa").textContent = "Halo, " + namaBaru + "! Selamat datang di web profil saya.";
});