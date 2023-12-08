<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataprodukModel;
use App\Models\DatakategoriModel;

class LaporanProduk extends BaseController
{
    protected $produkModel;
    protected $kategoriModel;

    public function __construct() {
        $this->produkModel = new DataprodukModel();
        $this->kategoriModel = new DatakategoriModel();
    }

    public function laporanproduk()
    {
        $jenis = $this->request->getGet('jenis');

        if ($jenis) {
            $hasil = $this->produkModel->filterProduk($jenis);
        } else {
            $hasil = $this->produkModel->fetchProduk();
        }

        $data = [
            'title' => 'Laporan Produk',
            'produk' => $hasil,
            'kategori' => $this->kategoriModel->fetchKategori()
        ];

        echo view('section/header', $data);
        echo view('section/sidebar');
        echo view('laporanproduk_view', $data);
        echo view('section/footer');
    }

    public function cetakLapProduk($jenis = null) {
        $kategori = $jenis;

        if ($kategori) {
            $hasil = $this->produkModel->filterProduk($kategori);
        } else {
            $hasil = $this->produkModel->fetchProduk();
        }

        $data = [
            'title' => 'Laporan Produk',
            'produk' => $hasil,
        ];

        echo view('section/header', $data);
        echo view('laporan/cetak_produk', $data);
        echo view('section/footer_laporan');
    }
}
