<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Barang Masuk</h5>
        <a href="/barangmasuk/create" class="btn btn-primary btn-sm">Tambah</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Masuk</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barang_masuk as $bm): ?>
                <tr>
                    <td><?= $bm['id'] ?></td>
                    <td><?= $bm['nama_barang'] ?></td>
                    <td><?= $bm['jumlah'] ?></td>
                    <td><?= $bm['tanggal_masuk'] ?></td>
                    <td>
                        <a href="/barangmasuk/edit/<?= $bm['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/barangmasuk/delete/<?= $bm['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
