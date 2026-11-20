<?php
require_once 'koneksi.php';

$id = (int)($_GET['id'] ?? 0);

// Ambil data lama berdasarkan id
$stmt = mysqli_prepare($koneksi, "SELECT * FROM mahasiswa WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$data) {
    $_SESSION['pesan'] = ['tipe' => 'danger', 'teks' => 'Data tidak ditemukan.'];
    header("Location: index.php");
    exit;
}

$error = '';

// UPDATE: proses saat form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data['nim']     = trim($_POST['nim'] ?? '');
    $data['nama']    = trim($_POST['nama'] ?? '');
    $data['jurusan'] = trim($_POST['jurusan'] ?? '');
    $data['email']   = trim($_POST['email'] ?? '');
    $data['no_hp']   = trim($_POST['no_hp'] ?? '');

    if ($data['nim'] === '' || $data['nama'] === '' || $data['jurusan'] === '' || $data['email'] === '') {
        $error = 'Field bertanda * wajib diisi.';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $error = 'Format email tidak valid.';
    } else {
        $upd = mysqli_prepare($koneksi, "UPDATE mahasiswa SET nim = ?, nama = ?, jurusan = ?, email = ?, no_hp = ? WHERE id = ?");
        mysqli_stmt_bind_param($upd, "sssssi", $data['nim'], $data['nama'], $data['jurusan'], $data['email'], $data['no_hp'], $id);
        
        try {
            mysqli_stmt_execute($upd);
            $_SESSION['pesan'] = ['tipe' => 'success', 'teks' => 'Data berhasil diperbarui.'];
            header("Location: index.php");
            exit;
        } catch (mysqli_sql_exception $ex) {
            $error = 'Gagal memperbarui. NIM mungkin sudah dipakai data lain.';
        }
    }
}

include 'header.php';
?>

<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-semibold">Edit Mahasiswa</h5>
    </div>
    <div class="card-body">
        <?php include '_form.php'; ?>
    </div>
</div>

<?php include 'footer.php'; ?>