<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistem Gudang' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }
        .sidebar {
            width: 220px;
            background-color: #212529;
            color: #fff;
            padding: 20px 10px;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 8px 10px;
            margin: 5px 0;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            flex: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-white mb-4">Sistem Gudang</h4>
        <a href="/">🏠 Dashboard</a>
        <a href="/kategori">📂 Kategori</a>
        <a href="/barang">📦 Barang</a>
        <a href="/pembelian">🧾 Data Pembelian</a>
        <a href="/barangmasuk">⬆️ Barang Masuk</a>
        <a href="/barangkeluar">⬇️ Barang Keluar</a>
    </div>

    <!-- Content -->
    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
