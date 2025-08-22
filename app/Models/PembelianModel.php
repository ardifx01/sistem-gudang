<?php
namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
    protected $table = 'pembelian';
    protected $primaryKey = 'id';
    protected $allowedFields = ['vendor', 'alamat_vendor', 'tanggal_pembelian', 'nama_pembeli', 'jumlah', 'barang_id'];
}
