<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);

$routes->get('/login', 'Login::login', ['filter' => 'visitor', 'filter' => 'lock']);
$routes->get('/logout', 'Login::keluar_admin');
$routes->get('/profile', 'Profil::profile', ['filter' => 'administrator']);
$routes->get('/profile/ganti_password', 'Profil::halGantiPass', ['filter' => 'administrator']);
$routes->get('/lock_screen', 'Lockscreen::lock', ['filter' => 'administrator']);

$routes->get('/', 'Dashboard::index', ['filter' => 'administrator']);
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'administrator']);

$routes->get('/data_kategori', 'DataKategori::datakategori', ['filter' => 'administrator']);
$routes->get('/edit_kategori/(:num)', 'DataKategori::editkategori/$1', ['filter' => 'administrator']);
$routes->get('/hapus_kategori/(:num)', 'DataKategori::hapuskategori/$1', ['filter' => 'administrator']);

$routes->get('/data_produk', 'DataProduk::dataproduk', ['filter' => 'administrator']);
$routes->get('/edit_produk/(:num)', 'DataProduk::editproduk/$1', ['filter' => 'administrator']);
$routes->get('/hapus_produk/(:num)', 'DataProduk::hapusproduk/$1', ['filter' => 'administrator']);

$routes->get('/transaksi', 'Transaksi::transaksi', ['filter' => 'administrator']);
$routes->get('/transaksi/listHarga/(:segment)', 'Transaksi::listHarga/$1', ['filter' => 'administrator']);
$routes->get('/transaksi/hapusList/(:segment)', 'Transaksi::hapusList/$1', ['filter' => 'administrator']);
$routes->get('/transaksi/jumlahTotal', 'Transaksi::jumlahTotal', ['filter' => 'administrator']);
$routes->get('/transaksi/resetList', 'Transaksi::resetList', ['filter' => 'administrator']);

$routes->get('/laporan_produk', 'LaporanProduk::laporanproduk', ['filter' => 'administrator']);
$routes->get('/laporan_pemasukan', 'LaporanPemasukan::laporanpemasukan', ['filter' => 'administrator']);

// dengan parameter
$routes->get('/laporan_pemasukan/cetakLapPemasukanPdf/(:any)/(:any)', 'LaporanPemasukan::cetakLapPemasukanPdf/$1/$1', ['filter' => 'administrator']);
$routes->get('/laporan_pemasukan/cetakLapPemasukanExcel/(:any)/(:any)', 'LaporanPemasukan::cetakLapPemasukanExcel/$1/$1', ['filter' => 'administrator']);

$routes->get('/laporan_produk/cetakLapProdukPdf/(:any)', 'LaporanProduk::cetakLapProdukPdf/$1', ['filter' => 'administrator']);
$routes->get('/laporan_produk/cetakLapProdukExcel/(:any)', 'LaporanProduk::cetakLapProdukExcel/$1', ['filter' => 'administrator']);

// tanpa parameter
$routes->get('/laporan_pemasukan/cetakLapPemasukanPdf//', 'LaporanPemasukan::cetakLapPemasukanPdf//', ['filter' => 'administrator']);
$routes->get('/laporan_pemasukan/cetakLapPemasukanExcel//', 'LaporanPemasukan::cetakLapPemasukanExcel//', ['filter' => 'administrator']);

$routes->get('/laporan_produk/cetakLapProdukPdf/', 'LaporanProduk::cetakLapProdukPdf/', ['filter' => 'administrator']);
$routes->get('/laporan_produk/cetakLapProdukExcel', 'LaporanProduk::cetakLapProdukExcel', ['filter' => 'administrator']);