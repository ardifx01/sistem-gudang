<?php
namespace App\Models;
use CodeIgniter\Model;

class BarangMasukModel extends Model {
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pembelian_id', 'barang_id', 'jumlah', 'tanggal_masuk'];
}
