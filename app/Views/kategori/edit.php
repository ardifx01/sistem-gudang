<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark text-center">
                    <h5 class="mb-0">Edit Kategori</h5>
                </div>
                <div class="card-body p-4">
                    <form method="post" action="<?= base_url('kategori/update/'.$kategori['id']) ?>">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label">Nama Kategori</label>
                            <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" value="<?= $kategori['nama_kategori'] ?>" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('kategori') ?>" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
