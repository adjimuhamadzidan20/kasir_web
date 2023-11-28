<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);

$routes->get('/', 'Dashboard::index');
$routes->get('/data_kategori', 'DataKategori::datakategori');
$routes->get('/edit_kategori/(:num)', 'DataKategori::editkategori/$1');
$routes->get('/hapus_kategori/(:num)', 'DataKategori::hapuskategori/$1');

$routes->get('/data_produk', 'DataProduk::dataproduk');
$routes->get('/edit_produk/(:num)', 'DataProduk::editproduk/$1');
$routes->get('/hapus_produk/(:num)', 'DataProduk::hapusproduk/$1');

$routes->get('/transaksi', 'Transaksi::transaksi');
$routes->get('/transaksi/listHarga/(:segment)', 'Transaksi::listHarga/$1');
$routes->get('/transaksi/hapusList/(:segment)', 'Transaksi::hapusList/$1');
$routes->get('/transaksi/jumlahTotal', 'Transaksi::jumlahTotal');
$routes->get('/transaksi/resetList', 'Transaksi::resetList');

