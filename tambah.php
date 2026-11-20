<?php
require_once 'koneksi.php';

$error = '';
$data = ['nim' => '', 'nama' => '', 'jurusan' => '', 'email' => '', 'no_hp' => ''];

// CREATE: proses saat form dikirim
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
        $stmt = mysqli_prepare($koneksi, "INSERT INTO mahasiswa (nim, nama, jurusan, email, no_hp) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssss", $data['nim'], $data['nama'], $data['jurusan'], $data['email'], $data['no_hp']);
        
        try {
            mysqli_stmt_execute($stmt);
            $_SESSION['pesan'] = ['tipe' => 'success', 'teks' => 'Data berhasil ditambahkan.'];
            header("Location: index.php");
            exit;
        } catch (mysqli_sql_exception $ex) {
            $error = 'Gagal menyimpan. NIM mungkin sudah terdaftar.';
        }
    }
}

include 'header.php';
?>

<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-semibold">Tambah Mahasiswa</h5>
    </div>
    <div class="card-body">
        <?php include '_form.php'; ?>
    </div>
</div>

<?php include 'footer.php'; ?>