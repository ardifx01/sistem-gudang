<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Laporan Gudang</h4>
    </div>
    <div class="card-body">
        <form action="/home/filter" method="post" class="row g-3 mb-3">
            <?= csrf_field() ?>
            <div class="col-md-5">
                <label for="tgl_awal" class="form-label">Tanggal Awal</label>
                <input type="date" name="tgl_awal" id="tgl_awal" class="form-control" required>
            </div>
            <div class="col-md-5">
                <label for="tgl_akhir" class="form-label">Tanggal Akhir</label>
                <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" required>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-success w-100">Filter</button>
            </div>
        </form>

        <h5>Stok Barang Terkini</h5>
        <table class="table table-bordered table-striped mb-4">
            <thead class="table-dark">
                <tr>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($barang as $b): ?>
                    <tr>
                        <td><?= $b['nama_barang'] ?></td>
                        <td><?= $b['stok'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h5>Barang Masuk</h5>
        <table class="table table-bordered table-striped mb-4">
            <thead class="table-dark">
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Masuk</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($barang_masuk as $bm): ?>
                    <tr>
                        <td><?= $bm['nama_barang'] ?? $bm['barang_id'] ?></td>
                        <td><?= $bm['jumlah'] ?></td>
                        <td><?= $bm['tanggal_masuk'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h5>Barang Keluar</h5>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Keluar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($barang_keluar as $bk): ?>
                    <tr>
                        <td><?= $bk['nama_barang'] ?? $bk['barang_id'] ?></td>
                        <td><?= $bk['jumlah'] ?></td>
                        <td><?= $bk['tanggal_keluar'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
