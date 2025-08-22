<h2>Transaksi Barang Keluar</h2>
<form action="/barangkeluar/store" method="post">
    <label>Tanggal Keluar:</label>
    <input type="date" name="tanggal_keluar" required><br><br>

    <h4>Pilih Barang & Jumlah:</h4>
    <table border="1" cellpadding="5">
        <tr>
            <th>Barang</th>
            <th>Stok Tersedia</th>
            <th>Jumlah Keluar</th>
        </tr>
        <?php foreach($barang as $b): ?>
        <tr>
            <td>
                <input type="checkbox" name="barang_id[]" value="<?= $b['id'] ?>">
                <?= $b['nama_barang'] ?>
            </td>
            <td><?= $b['stok'] ?></td>
            <td>
                <input type="number" name="jumlah[]" min="1" max="<?= $b['stok'] ?>" placeholder="Jumlah">
            </td>
        </tr>
        <?php endforeach; ?>
    </table><br>

    <button type="submit">Simpan Transaksi</button>
</form>
