<?php

namespace App\Controllers;

use App\Models\BarangMasukModel;
use App\Models\BarangModel;
use CodeIgniter\Controller;

class BarangMasuk extends Controller
{
    protected $barangMasukModel;
    protected $barangModel;

    public function __construct()
    {
        $this->barangMasukModel = new BarangMasukModel();
        $this->barangModel = new BarangModel();
    }

    // ===== INDEX =====
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('barang_masuk');
        $builder->select('barang_masuk.id, barang.nama_barang, barang_masuk.jumlah, barang_masuk.tanggal_masuk, barang.id as barang_id');
        $builder->join('barang', 'barang.id = barang_masuk.barang_id');
        $query = $builder->get();
        $data['barang_masuk'] = $query->getResultArray();

        return view('barangmasuk/index', $data);
    }

    // ===== CREATE =====
    public function create()
    {
        $data['barang'] = $this->barangModel->findAll();
        return view('barangmasuk/create', $data);
    }

    // ===== STORE =====
    public function store()
    {
        $barang_id = $this->request->getPost('barang_id');
        $jumlah = (int)$this->request->getPost('jumlah');
        $tanggal_masuk = $this->request->getPost('tanggal_masuk');

        $barang = $this->barangModel->find($barang_id);
        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan!');
        }

        // Simpan barang masuk
        $this->barangMasukModel->insert([
            'barang_id' => $barang_id,
            'jumlah' => $jumlah,
            'tanggal_masuk' => $tanggal_masuk
        ]);

        // Update stok
        $stok_baru = $barang['stok'] + $jumlah;
        $this->barangModel->update($barang_id, ['stok' => $stok_baru]);

        return redirect()->to('/barangmasuk')->with('success', 'Barang masuk berhasil dicatat!');
    }

    // ===== EDIT =====
    public function edit($id)
    {
        $barangMasuk = $this->barangMasukModel->find($id);
        if (!$barangMasuk) {
            return redirect()->to('/barangmasuk')->with('error', 'Data tidak ditemukan!');
        }

        $data['barang_masuk'] = $barangMasuk;
        $data['barang'] = $this->barangModel->findAll();

        return view('barangmasuk/edit', $data);
    }

    // ===== UPDATE =====
    public function update($id)
    {
        $barangMasuk = $this->barangMasukModel->find($id);
        if (!$barangMasuk) {
            return redirect()->to('/barangmasuk')->with('error', 'Data tidak ditemukan!');
        }

        $barang_id = $this->request->getPost('barang_id');
        $jumlah_baru = (int)$this->request->getPost('jumlah');
        $tanggal_masuk = $this->request->getPost('tanggal_masuk');

        $barang = $this->barangModel->find($barang_id);
        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan!');
        }

        // Kembalikan stok lama sebelum update
        $stok_baru = $barang['stok'] - $barangMasuk['jumlah'] + $jumlah_baru;

        // Update stok
        $this->barangModel->update($barang_id, ['stok' => $stok_baru]);

        // Update transaksi barang masuk
        $this->barangMasukModel->update($id, [
            'barang_id' => $barang_id,
            'jumlah' => $jumlah_baru,
            'tanggal_masuk' => $tanggal_masuk
        ]);

        return redirect()->to('/barangmasuk')->with('success', 'Barang masuk berhasil diupdate!');
    }

    // ===== DELETE =====
    public function delete($id)
    {
        $barangMasuk = $this->barangMasukModel->find($id);
        if ($barangMasuk) {
            $barang = $this->barangModel->find($barangMasuk['barang_id']);
            if ($barang) {
                $stok_baru = $barang['stok'] - $barangMasuk['jumlah'];
                $this->barangModel->update($barangMasuk['barang_id'], ['stok' => $stok_baru]);
            }

            $this->barangMasukModel->delete($id);
        }

        return redirect()->to('/barangmasuk')->with('success', 'Barang masuk berhasil dihapus!');
    }
}
