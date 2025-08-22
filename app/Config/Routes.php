<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Home::index');


//kategori
$routes->get('/kategori', 'Kategori::index');
$routes->get('/kategori/create', 'Kategori::create');
$routes->post('/kategori/store', 'Kategori::store');
$routes->get('/kategori/edit/(:num)', 'Kategori::edit/$1');
$routes->post('/kategori/update/(:num)', 'Kategori::update/$1');
$routes->get('/kategori/delete/(:num)', 'Kategori::delete/$1');

//barang
$routes->get('/barang', 'Barang::index');
$routes->get('/barang/create', 'Barang::create');
$routes->post('/barang/store', 'Barang::store');
$routes->get('/barang/edit/(:num)', 'Barang::edit/$1');
$routes->post('/barang/update/(:num)', 'Barang::update/$1');
$routes->get('/barang/delete/(:num)', 'Barang::delete/$1');

//pembelian
$routes->get('/pembelian', 'Pembelian::index');
$routes->get('/pembelian/create', 'Pembelian::create');
$routes->post('/pembelian/store', 'Pembelian::store');
$routes->get('/pembelian/edit/(:num)', 'Pembelian::edit/$1');
$routes->post('/pembelian/update/(:num)', 'Pembelian::update/$1');
$routes->post('/pembelian/delete/(:num)', 'Pembelian::delete/$1');


// Barang Masuk
// Barang Masuk
$routes->get('/barangmasuk', 'BarangMasuk::index');          // Tampilkan semua barang masuk
$routes->get('/barangmasuk/create', 'BarangMasuk::create');  // Form tambah barang masuk
$routes->post('/barangmasuk/store', 'BarangMasuk::store');   // Simpan barang masuk baru
$routes->get('/barangmasuk/edit/(:num)', 'BarangMasuk::edit/$1'); // Form edit barang masuk
$routes->post('/barangmasuk/update/(:num)', 'BarangMasuk::update/$1'); // Update barang masuk
$routes->get('/barangmasuk/delete/(:num)', 'BarangMasuk::delete/$1');  // Hapus barang masuk


$routes->get('barangkeluar', 'BarangKeluar::index');
$routes->get('barangkeluar/create', 'BarangKeluar::create');
$routes->post('barangkeluar/store', 'BarangKeluar::store');
$routes->get('barangkeluar/edit/(:num)', 'BarangKeluar::edit/$1');
$routes->post('barangkeluar/update/(:num)', 'BarangKeluar::update/$1');
$routes->post('barangkeluar/delete/(:num)', 'BarangKeluar::delete/$1');
// Barang Keluar

// Home

$routes->get('/', 'Home::index');
$routes->post('/home/filter', 'Home::filter'); // untuk filter tanggal
