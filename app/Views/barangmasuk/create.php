<h2>Tambah Barang Masuk</h2>

<form action="/barangmasuk/store" method="post">
    <label>Tanggal Masuk:</label>
    <input type="date" name="tanggal_masuk" required><br><br>

    <h4>Pilih Barang & Jumlah:</h4>
    <div id="barang-container">
        <div class="barang-row">
            <select name="barang_id[]" required>
                <option value="">-- Pilih Barang --</option>
                <?php foreach($barang as $b): ?>
                    <option value="<?= $b['id'] ?>"><?= $b['nama_barang'] ?> (Stok: <?= $b['stok'] ?>)</option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="jumlah[]" min="1" placeholder="Jumlah" required>
            <button type="button" onclick="removeRow(this)">Hapus</button>
        </div>
    </div>

    <button type="button" onclick="addRow()">Tambah Barang</button><br><br>

    <button type="submit">Simpan</button>
</form>

<script>
function addRow() {
    const container = document.getElementById('barang-container');
    const newRow = document.createElement('div');
    newRow.classList.add('barang-row');
    newRow.innerHTML = `
        <select name="barang_id[]" required>
            <option value="">-- Pilih Barang --</option>
            <?php foreach($barang as $b): ?>
                <option value="<?= $b['id'] ?>"><?= $b['nama_barang'] ?> (Stok: <?= $b['stok'] ?>)</option>
            <?php endforeach; ?>
        </select>
        <input type="number" name="jumlah[]" min="1" placeholder="Jumlah" required>
        <button type="button" onclick="removeRow(this)">Hapus</button>
    `;
    container.appendChild(newRow);
}

function removeRow(button) {
    button.parentElement.remove();
}
</script>
