<?php
require_once 'koneksi.php';

// DELETE: hanya menerima metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    
    $stmt = mysqli_prepare($koneksi, "DELETE FROM mahasiswa WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $_SESSION['pesan'] = ['tipe' => 'success', 'teks' => 'Data berhasil dihapus.'];
    } else {
        $_SESSION['pesan'] = ['tipe' => 'danger', 'teks' => 'Data tidak ditemukan.'];
    }
}

header("Location: index.php");
exit;
?>