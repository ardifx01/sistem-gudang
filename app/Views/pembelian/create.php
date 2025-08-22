<h2>Tambah Pembelian</h2>

<form action="/pembelian/store" method="post">
    <?= csrf_field() ?>

    <label>Vendor:</label>
    <input type="text" name="vendor" required><br>

    <label>Alamat Vendor:</label>
    <input type="text" name="alamat_vendor" required><br>

    <label>Tanggal Pembelian:</label>
    <input type="date" name="tanggal_pembelian" required><br>

    <label>Nama Pembeli:</label>
    <input type="text" name="nama_pembeli" required><br>

    <h4>Pilih Barang & Jumlah:</h4>

    <?php foreach($barang as $b): ?>
        <input type="checkbox" name="barang_id[]" value="<?= $b['id'] ?>">
        <?= $b['nama_barang'] ?>

        <input type="number" name="jumlah[]" min="1" value="1"><br>
    <?php endforeach; ?>

    <button type="submit">Simpan</button>
</form>
