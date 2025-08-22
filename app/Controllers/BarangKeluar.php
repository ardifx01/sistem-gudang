<?php

namespace App\Controllers;

use App\Models\BarangKeluarModel;
use App\Models\BarangModel;
use CodeIgniter\Controller;

class BarangKeluar extends Controller
{
    protected $barangKeluarModel;
    protected $barangModel;

    public function __construct()
    {
        $this->barangKeluarModel = new BarangKeluarModel();
        $this->barangModel = new BarangModel();
    }

    // ===== INDEX =====
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('barang_keluar');
        $builder->select('barang_keluar.id, barang.nama_barang, barang_keluar.jumlah, barang_keluar.tanggal_keluar');
        $builder->join('barang', 'barang.id = barang_keluar.barang_id');
        $query = $builder->get();
        $data['barang_keluar'] = $query->getResultArray();

        return view('barangkeluar/index', $data);
    }

    // ===== CREATE =====
    public function create()
    {
        $data['barang'] = $this->barangModel->findAll();
        return view('barangkeluar/create', $data);
    }

    // ===== STORE =====
    public function store()
{
    $barang_ids = $this->request->getPost('barang_id');
    $jumlahs = $this->request->getPost('jumlah');
    $tanggal_keluar = $this->request->getPost('tanggal_keluar');

    if ($barang_ids && is_array($barang_ids)) {
        foreach ($barang_ids as $index => $barang_id) {
            $barang = $this->barangModel->find($barang_id);
            if (!$barang) continue;

            $jumlah = (int)$jumlahs[$index];

            // Validasi stok cukup
            if ($jumlah < 1 || $jumlah > $barang['stok']) {
                return redirect()->back()->with('error', "Jumlah barang {$barang['nama_barang']} tidak valid!");
            }

            // Simpan transaksi
            $this->barangKeluarModel->insert([
                'barang_id' => $barang_id,
                'jumlah' => $jumlah,
                'tanggal_keluar' => $tanggal_keluar
            ]);

            // Kurangi stok
            $stok_baru = $barang['stok'] - $jumlah;
            $this->barangModel->update($barang_id, ['stok' => $stok_baru]);
        }
    }

    return redirect()->to('/barangkeluar')->with('success', 'Transaksi barang keluar berhasil!');
}

    // ===== EDIT =====
    public function edit($id)
    {
        $transaksi = $this->barangKeluarModel->find($id);
        if (!$transaksi) {
            return redirect()->to('/barangkeluar')->with('error', 'Data tidak ditemukan!');
        }

        $data['transaksi'] = $transaksi;
        $data['barang'] = $this->barangModel->findAll();

        return view('barangkeluar/edit', $data);
    }

    // ===== UPDATE =====
    public function update($id)
    {
        $transaksi = $this->barangKeluarModel->find($id);
        if (!$transaksi) return redirect()->to('/barangkeluar');

        $barang_id = $this->request->getPost('barang_id');
        $jumlah_baru = (int)$this->request->getPost('jumlah');
        $tanggal_keluar = $this->request->getPost('tanggal_keluar');

        $barang = $this->barangModel->find($barang_id);
        if (!$barang) return redirect()->to('/barangkeluar');

        // kembalikan stok lama
        $stok_baru = $barang['stok'] + $transaksi['jumlah'];

        // cek stok cukup
        if ($jumlah_baru > $stok_baru) {
            return redirect()->back()->with('error', 'Jumlah melebihi stok!');
        }

        // update stok
        $this->barangModel->update($barang_id, ['stok' => $stok_baru - $jumlah_baru]);

        // update transaksi
        $this->barangKeluarModel->update($id, [
            'barang_id' => $barang_id,
            'jumlah' => $jumlah_baru,
            'tanggal_keluar' => $tanggal_keluar
        ]);

        return redirect()->to('/barangkeluar')->with('success', 'Transaksi berhasil diupdate!');
    }

    // ===== DELETE =====
    public function delete($id)
    {
        $transaksi = $this->barangKeluarModel->find($id);
        if ($transaksi) {
            $barang = $this->barangModel->find($transaksi['barang_id']);
            if ($barang) {
                $stok_baru = $barang['stok'] + $transaksi['jumlah'];
                $this->barangModel->update($transaksi['barang_id'], ['stok' => $stok_baru]);
            }

            $this->barangKeluarModel->delete($id);
        }

        return redirect()->to('/barangkeluar')->with('success', 'Transaksi berhasil dihapus!');
    }
}
