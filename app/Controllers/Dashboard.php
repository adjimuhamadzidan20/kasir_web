<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DatakategoriModel;
use App\Models\DataprodukModel;
use App\Models\PemasukanModel;

class Dashboard extends BaseController
{
    protected $produkModel;
    protected $kategoriModel;
    protected $pemasukanModel;

    public function __construct() {
        $this->kategoriModel = new DatakategoriModel();
        $this->produkModel = new DataprodukModel();
        $this->pemasukanModel = new PemasukanModel();
    }

    public function index()
    {
        $produk = $this->produkModel->jumlahProduk();
        $kategori = $this->kategoriModel->jumlahKategori();
        $pemasukan = $this->pemasukanModel->fetchPemasukan();
        $total = array_sum(array_column($pemasukan, 'jumlah_nominal'));

        $data = [
            'title' => 'Dashboard',
            'jumlahKategori' => $kategori,
            'jumlahProduk' => $produk,
            'jumlahPemasukan' => $total
        ];

        echo view('section/header', $data);
        echo view('section/sidebar');
        echo view('dashboard_view', $data);
        echo view('section/footer');
    }
}
