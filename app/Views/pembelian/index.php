<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Pembelian</h5>
        <a href="/pembelian/create" class="btn btn-primary btn-sm">Tambah</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Vendor</th>
                    <th>Tanggal Pembelian</th>
                    <th>Nama Pembeli</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pembelian as $p): ?>
                <tr>
                    <td><?= $p['id'] ?></td>
                    <td><?= $p['vendor'] ?></td>
                    <td><?= $p['tanggal_pembelian'] ?></td>
                    <td><?= $p['nama_pembeli'] ?></td>
                    <td>
                        <a href="/pembelian/edit/<?= $p['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/pembelian/delete/<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
