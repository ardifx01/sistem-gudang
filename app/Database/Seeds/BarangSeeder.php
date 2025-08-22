<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_barang' => 'BRG001',
                'nama_barang' => 'Laptop Lenovo',
                'kategori_id' => 1,
                'satuan' => 'unit',
                'stok' => 10
            ],
            [
                'kode_barang' => 'BRG002',
                'nama_barang' => 'Printer Epson',
                'kategori_id' => 2,
                'satuan' => 'unit',
                'stok' => 5
            ],
            [
                'kode_barang' => 'BRG003',
                'nama_barang' => 'Ban Mobil',
                'kategori_id' => 3,
                'satuan' => 'pcs',
                'stok' => 20
            ],
        ];

        $this->db->table('barang')->insertBatch($data);
    }
}
