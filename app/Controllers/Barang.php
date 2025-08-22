<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use CodeIgniter\Controller;

class Barang extends Controller
{
    protected $barangModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->kategoriModel = new KategoriModel();
    }

    // ===== INDEX =====
    public function index()
    {
        $data['barang'] = $this->barangModel
            ->select('barang.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id = barang.kategori_id', 'left')
            ->findAll();
        return view('barang/index', $data);
    }

    // ===== CREATE =====
    public function create()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        return view('barang/create', $data);
    }

    // ===== STORE =====
    public function store()
    {
        $data = [
            'kode_barang' => $this->request->getPost('kode_barang'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'satuan' => $this->request->getPost('satuan'),
            'stok' => (int)$this->request->getPost('stok'),
        ];

        $this->barangModel->save($data);
        return redirect()->to('/barang')->with('success', 'Barang berhasil ditambahkan!');
    }

    // ===== EDIT =====
    public function edit($id)
    {
        $data['barang'] = $this->barangModel->find($id);
        $data['kategori'] = $this->kategoriModel->findAll();

        if (!$data['barang']) {
            return redirect()->to('/barang')->with('error', 'Barang tidak ditemukan!');
        }

        return view('barang/edit', $data);
    }

    // ===== UPDATE =====
    public function update($id)
    {
        $data = [
            'kode_barang' => $this->request->getPost('kode_barang'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'satuan' => $this->request->getPost('satuan'),
            'stok' => (int)$this->request->getPost('stok'),
        ];

        $this->barangModel->update($id, $data);
        return redirect()->to('/barang')->with('success', 'Barang berhasil diupdate!');
    }

    // ===== DELETE =====
    public function delete($id)
    {
        $this->barangModel->delete($id);
        return redirect()->to('/barang')->with('success', 'Barang berhasil dihapus!');
    }
}
