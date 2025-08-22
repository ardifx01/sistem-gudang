<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGudangTables extends Migration
{
    public function up()
    {
        // Kategori
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'nama_kategori' => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kategori');

        // Barang
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'kode_barang' => ['type' => 'VARCHAR', 'constraint' => 50, 'unique' => true],
            'nama_barang' => ['type' => 'VARCHAR', 'constraint' => 100],
            'kategori_id' => ['type' => 'INT'],
            'satuan' => ['type' => 'VARCHAR', 'constraint' => 50],
            'stok' => ['type' => 'INT', 'default' => 0],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('barang');

        // Pembelian
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'vendor' => ['type' => 'VARCHAR', 'constraint' => 100],
            'alamat_vendor' => ['type' => 'TEXT'],
            'tanggal_pembelian' => ['type' => 'DATE'],
            'nama_pembeli' => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pembelian');

        // Pembelian Detail
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'pembelian_id' => ['type' => 'INT'],
            'barang_id' => ['type' => 'INT'],
            'jumlah' => ['type' => 'INT'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pembelian_detail');

        // Barang Masuk
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'pembelian_id' => ['type' => 'INT'],
            'barang_id' => ['type' => 'INT'],
            'jumlah' => ['type' => 'INT'],
            'tanggal_masuk' => ['type' => 'DATE'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('barang_masuk');

        // Barang Keluar
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'barang_id' => ['type' => 'INT'],
            'jumlah' => ['type' => 'INT'],
            'tanggal_keluar' => ['type' => 'DATE'],
            'keterangan' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('barang_keluar');
    }

    public function down()
    {
        $this->forge->dropTable('barang_keluar');
        $this->forge->dropTable('barang_masuk');
        $this->forge->dropTable('pembelian_detail');
        $this->forge->dropTable('pembelian');
        $this->forge->dropTable('barang');
        $this->forge->dropTable('kategori');
    }
}
