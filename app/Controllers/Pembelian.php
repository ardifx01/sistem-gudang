<?php

namespace App\Controllers;

use App\Models\PembelianModel;
use App\Models\PembelianDetailModel;
use App\Models\BarangModel;
use CodeIgniter\Controller;

class Pembelian extends Controller
{
    protected $pembelianModel;
    protected $pembelianDetailModel;
    protected $barangModel;

    public function __construct()
    {
        $this->pembelianModel = new PembelianModel();
        $this->pembelianDetailModel = new PembelianDetailModel();
        $this->barangModel = new BarangModel();
    }

    // ===== INDEX =====
    public function index()
    {
        $data['pembelian'] = $this->pembelianModel->findAll();
        return view('pembelian/index', $data);
    }

    // ===== CREATE =====
    public function create()
    {
        $data['barang'] = $this->barangModel->findAll();
        return view('pembelian/create', $data);
    }

    // ===== STORE =====
    public function store()
    {
        // Simpan pembelian utama
        $this->pembelianModel->insert([
            'vendor' => $this->request->getPost('vendor'),
            'alamat_vendor' => $this->request->getPost('alamat_vendor'),
            'tanggal_pembelian' => $this->request->getPost('tanggal_pembelian'),
            'nama_pembeli' => $this->request->getPost('nama_pembeli'),
            'jumlah' => (int)$this->request->getPost('jumlah')
        ]);

        $pembelianId = $this->pembelianModel->getInsertID();

        // Simpan detail barang yang dibeli & update stok barang
        $barang_ids = $this->request->getPost('barang_id');
        $jumlahs = $this->request->getPost('jumlah');

        if ($barang_ids && is_array($barang_ids)) {
            foreach ($barang_ids as $index => $barang_id) {
                $jumlah = (int)$jumlahs[$index];

                // Insert detail
                $this->pembelianDetailModel->insert([
                    'pembelian_id' => $pembelianId,
                    'barang_id' => $barang_id,
                    'jumlah' => $jumlah
                ]);

                // Update stok barang
                $barang = $this->barangModel->find($barang_id);
                if ($barang) {
                    $stok_baru = $barang['stok'] + $jumlah;
                    $this->barangModel->update($barang_id, ['stok' => $stok_baru]);
                }
            }
        }

        return redirect()->to('/pembelian')->with('success', 'Pembelian berhasil ditambahkan!');
    }

    // ===== EDIT =====
    public function edit($id)
    {
        $pembelian = $this->pembelianModel->find($id);
        if (!$pembelian) {
            return redirect()->to('/pembelian')->with('error', 'Data tidak ditemukan');
        }

        $barang = $this->barangModel->findAll();

        // Ambil detail barang pembelian
        $detail_barang = $this->pembelianDetailModel->where('pembelian_id', $id)->findAll();
        $detail_map = [];
        foreach ($detail_barang as $d) {
            $detail_map[$d['barang_id']] = $d['jumlah'];
        }

        $data = [
            'pembelian' => $pembelian,
            'barang' => $barang,
            'detail_map' => $detail_map
        ];

        return view('pembelian/edit', $data);
    }

    // ===== UPDATE =====
    public function update($id)
    {
        $data = [
            'vendor' => $this->request->getPost('vendor'),
            'alamat_vendor' => $this->request->getPost('alamat_vendor'),
            'tanggal_pembelian' => $this->request->getPost('tanggal_pembelian'),
            'nama_pembeli' => $this->request->getPost('nama_pembeli'),
            'jumlah' => (int)$this->request->getPost('jumlah')
        ];

        $this->pembelianModel->update($id, $data);

        // ===== 1. Kurangi stok barang lama =====
        $detail_lama = $this->pembelianDetailModel->where('pembelian_id', $id)->findAll();
        foreach ($detail_lama as $d) {
            $barang = $this->barangModel->find($d['barang_id']);
            if ($barang) {
                $stok_baru = $barang['stok'] - $d['jumlah'];
                $this->barangModel->update($d['barang_id'], ['stok' => $stok_baru]);
            }
        }

        // ===== 2. Hapus detail lama =====
        $this->pembelianDetailModel->where('pembelian_id', $id)->delete();

        // ===== 3. Insert detail baru & update stok baru =====
        $barang_ids = $this->request->getPost('barang_id');
        $jumlahs = $this->request->getPost('jumlah');

        if ($barang_ids && is_array($barang_ids)) {
            foreach ($barang_ids as $index => $barang_id) {
                $jumlah = (int)$jumlahs[$index];

                // Insert detail baru
                $this->pembelianDetailModel->insert([
                    'pembelian_id' => $id,
                    'barang_id' => $barang_id,
                    'jumlah' => $jumlah
                ]);

                // Update stok barang
                $barang = $this->barangModel->find($barang_id);
                if ($barang) {
                    $stok_baru = $barang['stok'] + $jumlah;
                    $this->barangModel->update($barang_id, ['stok' => $stok_baru]);
                }
            }
        }

        return redirect()->to('/pembelian')->with('success', 'Data berhasil diupdate');
    }

    // ===== DELETE =====
    public function delete($id)
    {
        // Kurangi stok barang dulu
        $detail_lama = $this->pembelianDetailModel->where('pembelian_id', $id)->findAll();
        foreach ($detail_lama as $d) {
            $barang = $this->barangModel->find($d['barang_id']);
            if ($barang) {
                $stok_baru = $barang['stok'] - $d['jumlah'];
                $this->barangModel->update($d['barang_id'], ['stok' => $stok_baru]);
            }
        }

        // Hapus detail pembelian
        $this->pembelianDetailModel->where('pembelian_id', $id)->delete();

        // Hapus pembelian utama
        $this->pembelianModel->delete($id);

        return redirect()->to('/pembelian')->with('success', 'Data berhasil dihapus');
    }
}
