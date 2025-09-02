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
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        .layout {
            flex: 1;
            display: flex;
        }
        aside.sidebar {
            width: 220px;
            background-color: #212529;
            color: #fff;
            padding: 20px 10px;
        }
        aside.sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 8px 10px;
            margin: 5px 0;
            border-radius: 5px;
        }
        aside.sidebar a:hover {
            background-color: #495057;
        }
        main.content {
            flex: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

    <!-- Layout -->
    <div class="layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h4 class="mb-4">Sistem Gudang</h4>
            <a href="/">🏠 Dashboard</a>
            <a href="/kategori">📂 Kategori</a>
            <a href="/barang">📦 Barang</a>
            <a href="/pembelian">🧾 Data Pembelian</a>
            <a href="/barangmasuk">⬆️ Barang Masuk</a>
            <a href="/barangkeluar">⬇️ Barang Keluar</a>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <?= $this->renderSection('content') ?>
        </main>
    </div>

    <!-- Footer -->
    <footer class="py-1 border-top mt-auto bg-light">
        <div class="container text-center">
            <ul class="nav justify-content-center mb-1">
                
            </ul>
            <p class="text-body-secondary mb-0">&copy; Atha Ezrafi</p>
        </div>
    </footer>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
