<?php require_once __DIR__ . '/koneksi.php';

// RED: ambil data (dengan fitur pencarian)
$cari = trim($_GET['cari']?? '');
if ($cari !== '') {
    $like = "%" . $cari ."%";
    $stmt = mysqli_prepare($koneksi,"SELECT * FROM mahasiswa WHERE nama LIKE ? OR nim LIKE ? ORDER BY id DESC");
    mysqli_stmt_bind_param($stmt, "ss", $like, $like);
    mysqli_stmt_execute($stmt);
    $hasil = mysqli_stmt_get_result($stmt);
} else {
    $hasil = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id DESC");
}

include 'header.php';
?>

<div class="card shadow-sm border-0">
    <div class="card-header bt-whitw py-3">
        <div calss="row g-2 alighn-items-center">
            <div class="col-md-6">
                <h5 class="mb-0 fw-semibold">Data Mhasiswa</h5>
</div>
            <div class="col-md-6">
                <form method="get" class="d-flex gap-2">
                    <input type="text" name="cari" class="form-control" placeholder="Cari nama atau NIM..." value="<?= e($cari) ?>">
                    <button class="btn btn-outline-primary">Cari</button>
                    <a href="tambah.php" class="btn btn-primary text-nowrap">+ Tambah</a>
                </form>
            </div>
        </div>
    </div>

<div class="table-responsive">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php while ($row = mysqli_fetch_assoc($hasil)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= e($row['nim']) ?></td>
                    <td><?= e($row['nama']) ?></td>
                    <td><span class="badge text-bg-info"><?= e($row['jurusan']) ?></span></td>
                    <td><?= e($row['email']) ?></td>
                    <td><?= e($row['no_hp']) ?></td>
                    <td class="text-center text-nowrap">
                        <a href="edit.php?id=<?= (int)$row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="hapus.php" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            <input type="hidden" name="id" value="<?= (int)$row['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php if ($no === 1): ?>
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">Belum ada data.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>
