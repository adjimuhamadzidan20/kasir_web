<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);

$routes->get('/login', 'Login::login', ['filter' => 'visitor']);

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
$routes->get('/laporan_pemasukan/cetakLapPemasukan/(:any)/(:any)', 'LaporanPemasukan::cetakLapPemasukan/$1/$1', ['filter' => 'administrator']);
$routes->get('/laporan_produk/cetakLapProduk/(:any)', 'LaporanProduk::cetakLapProduk/$1', ['filter' => 'administrator']);

