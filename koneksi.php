<?php
session_start();
$host = "localhost";
$user = "root";
$pass = ""; // default XAMPP:
$db   = "db_crud";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

mysqli_set_charset($koneksi, "utf8mb4");

// Daftar pilihan jurusan untuk form
$daftar_jurusan = [
    "Teksnik Informatika",
    "Sistem Informasi",
    "Teknik Elektronika",
    "manajemen",
    "Akuntasi"
];

// Fungsi bantu: cegah XSS saat menampilkan data
function e($teks) {
    return htmlspecialchars($teks ??'', ENT_QUOTES, 'UTF-8');
}
?>