<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark text-center">
                    <h5 class="mb-0">Edit Barang Masuk</h5>
                </div>
                <div class="card-body p-4">
                    <form action="/barangmasuk/update/<?= $barang_masuk['id'] ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" value="<?= $barang_masuk['tanggal_masuk'] ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pilih Barang</label>
                            <select name="barang_id" class="form-select" required>
                                <option value="">-- Pilih Barang --</option>
                                <?php foreach($barang as $b): ?>
                                    <option value="<?= $b['id'] ?>" <?= $b['id'] == $barang_masuk['barang_id'] ? 'selected' : '' ?>>
                                        <?= $b['nama_barang'] ?> (Stok: <?= $b['stok'] ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" min="1" value="<?= $barang_masuk['jumlah'] ?>" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="/barangmasuk" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
