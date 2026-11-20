<?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= e($error) ?></div>
<?php endif; ?>

<form method="post">
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">NIM <span class="text-danger">*</span></label>
            <input type="text" name="nim" class="form-control" value="<?= e($data['nim']) ?>" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
            <input type="text" name="nama" class="form-control" value="<?= e($data['nama']) ?>" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Jurusan <span class="text-danger">*</span></label>
            <select name="jurusan" class="form-select" required>
                <option value="">-- Pilih Jurusan --</option>
                <?php foreach ($daftar_jurusan as $j): ?>
                    <option value="<?= e($j) ?>" <?= $data['jurusan'] === $j ? 'selected' : '' ?>>
                        <?= e($j) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control" value="<?= e($data['email']) ?>" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">No. HP</label>
            <input type="text" name="no_hp" class="form-control" value="<?= e($data['no_hp']) ?>">
        </div>
    </div>

    <div class="mt-4 d-flex gap-2">
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </div>
</form>