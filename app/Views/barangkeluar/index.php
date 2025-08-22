<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Barang Keluar</h5>
        <a href="/barangkeluar/create" class="btn btn-primary btn-sm">Tambah</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Keluar</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barang_keluar as $bk): ?>
                <tr>
                    <td><?= $bk['id'] ?></td>
                    <td><?= $bk['nama_barang'] ?></td>
                    <td><?= $bk['jumlah'] ?></td>
                    <td><?= $bk['tanggal_keluar'] ?></td>
                    <td>
                        <a href="/barangkeluar/edit/<?= $bk['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/barangkeluar/delete/<?= $bk['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
