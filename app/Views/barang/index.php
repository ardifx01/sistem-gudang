<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Barang</h5>
        <a href="/barang/create" class="btn btn-primary btn-sm">Tambah</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barang as $b): ?>
                <tr>
                    <td><?= $b['kode_barang'] ?></td>
                    <td><?= $b['nama_barang'] ?></td>
                    <td><?= $b['nama_kategori'] ?></td>
                    <td><?= $b['satuan'] ?></td>
                    <td><?= $b['stok'] ?></td>
                    <td>
                        <a href="/barang/edit/<?= $b['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/barang/delete/<?= $b['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus barang ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
