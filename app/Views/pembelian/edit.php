<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark text-center">
                    <h5 class="mb-0">Edit Pembelian</h5>
                </div>
                <div class="card-body p-4">
                    <form action="/pembelian/update/<?= $pembelian['id'] ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label class="form-label">Vendor</label>
                            <input type="text" name="vendor" value="<?= $pembelian['vendor'] ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat Vendor</label>
                            <input type="text" name="alamat_vendor" value="<?= $pembelian['alamat_vendor'] ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Pembelian</label>
                            <input type="date" name="tanggal_pembelian" value="<?= $pembelian['tanggal_pembelian'] ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Pembeli</label>
                            <input type="text" name="nama_pembeli" value="<?= $pembelian['nama_pembeli'] ?>" class="form-control" required>
                        </div>

                        <h6 class="mt-4">Pilih Barang & Jumlah</h6>
                        <div class="row">
                            <?php foreach($barang as $b): 
                                $checked = isset($detail_map[$b['id']]) ? 'checked' : '';
                                $jumlah = isset($detail_map[$b['id']]) ? $detail_map[$b['id']] : 1;
                            ?>
                                <div class="col-md-6 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="barang_id[]" value="<?= $b['id'] ?>" id="barang<?= $b['id'] ?>" <?= $checked ?>>
                                        <label class="form-check-label" for="barang<?= $b['id'] ?>">
                                            <?= $b['nama_barang'] ?>
                                        </label>
                                    </div>
                                    <input type="number" name="jumlah[]" min="1" value="<?= $jumlah ?>" class="form-control mt-1">
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="/pembelian" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
