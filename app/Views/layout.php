<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistem Gudang' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">Sistem Gudang</a>
        <div>
            <a href="/kategori" class="btn btn-outline-light btn-sm me-2">Kategori</a>
            <a href="/barang" class="btn btn-outline-light btn-sm">Barang</a>
            <a href="/pembelian" class="btn btn-outline-light btn-sm">Data Pembelian</a>
            <a href="/barangmasuk" class="btn btn-outline-light btn-sm">Barang Masuk</a>
            <a href="/barangkeluar" class="btn btn-outline-light btn-sm">Barang Keluar</a>
        </div>
    </div>
</nav>

<div class="container">
    <?= $this->renderSection('content') ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
