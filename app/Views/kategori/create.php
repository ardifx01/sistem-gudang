<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header">
        <h5>Tambah Kategori</h5>
    </div>
    <div class="card-body">
        <form action="/kategori/store" method="post">
            <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/kategori" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
