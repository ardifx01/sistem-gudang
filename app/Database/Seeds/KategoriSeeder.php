<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_kategori' => 'IT EQUIPMENTS'],
            ['nama_kategori' => 'OFFICE EQUIPMENTS'],
            ['nama_kategori' => 'SPARE PART'],
            ['nama_kategori' => 'KENDARAAN DAN ALAT BERAT'],
        ];

        $this->db->table('kategori')->insertBatch($data);
    }
}
