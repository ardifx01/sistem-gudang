<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\BarangMasukModel;
use App\Models\BarangKeluarModel;
use CodeIgniter\Controller;

class Home extends Controller
{
    protected $barangModel;
    protected $barangMasukModel;
    protected $barangKeluarModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->barangMasukModel = new BarangMasukModel();
        $this->barangKeluarModel = new BarangKeluarModel();
    }

    public function index()
    {
        $data['barang'] = $this->barangModel->findAll();

        // Barang Masuk dengan nama barang
        $builderMasuk = $this->barangMasukModel->builder();
        $builderMasuk->select('barang_masuk.*, barang.nama_barang');
        $builderMasuk->join('barang', 'barang.id = barang_masuk.barang_id');
        $data['barang_masuk'] = $builderMasuk->get()->getResultArray();

        // Barang Keluar dengan nama barang
        $builderKeluar = $this->barangKeluarModel->builder();
        $builderKeluar->select('barang_keluar.*, barang.nama_barang');
        $builderKeluar->join('barang', 'barang.id = barang_keluar.barang_id');
        $data['barang_keluar'] = $builderKeluar->get()->getResultArray();

        return view('home', $data);
    }

    public function filter()
    {
        $tgl_awal = $this->request->getPost('tgl_awal');
        $tgl_akhir = $this->request->getPost('tgl_akhir');

        $data['barang'] = $this->barangModel->findAll();

        // Barang Masuk filter rentang tanggal
        $builderMasuk = $this->barangMasukModel->builder();
        $builderMasuk->select('barang_masuk.*, barang.nama_barang');
        $builderMasuk->join('barang', 'barang.id = barang_masuk.barang_id');
        $builderMasuk->where('tanggal_masuk >=', $tgl_awal);
        $builderMasuk->where('tanggal_masuk <=', $tgl_akhir);
        $data['barang_masuk'] = $builderMasuk->get()->getResultArray();

        // Barang Keluar filter rentang tanggal
        $builderKeluar = $this->barangKeluarModel->builder();
        $builderKeluar->select('barang_keluar.*, barang.nama_barang');
        $builderKeluar->join('barang', 'barang.id = barang_keluar.barang_id');
        $builderKeluar->where('tanggal_keluar >=', $tgl_awal);
        $builderKeluar->where('tanggal_keluar <=', $tgl_akhir);
        $data['barang_keluar'] = $builderKeluar->get()->getResultArray();

        return view('home', $data);
    }
}
