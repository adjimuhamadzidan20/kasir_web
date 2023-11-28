<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataprodukModel;
use App\Models\DatakategoriModel;

class DataProduk extends BaseController
{
    protected $produkModel;
    protected $kategoriModel;

    public function __construct() {
        $this->produkModel = new DataprodukModel();
        $this->kategoriModel = new DatakategoriModel();
    }

    public function dataproduk()
    {
        $data = [
            'title' => 'Produk',
            'produk' => $this->produkModel->fetchProduk(),
            'kategori' => $this->kategoriModel->fetchKategori()
        ];

        echo view('section/header', $data);
        echo view('section/sidebar');
        echo view('data_produk_view', $data);
        echo view('section/footer');
    }

    public function tambah() {
        $kode = 'PR0';
        $produk = $this->request->getPost('namaproduk');
        $kategori = $this->request->getPost('kategori');
        $harga = $this->request->getPost('hargasatuan');
        $jumlah = $this->request->getPost('jumlahstok');

        $this->produkModel->addProduk($kode, $produk, $kategori, $harga, $jumlah);
        return redirect()->to('/data_produk');
    }

    public function editproduk($id) {
        $getIdProduk = $this->produkModel->fetchIdProduk($id)->getRow();
        $getKategori = $this->kategoriModel->fetchKategori();

        $data = [
            'title' => 'Kategori',
            'produk' => $getIdProduk,
            'kategori' => $getKategori
        ];

        echo view('section/header', $data);
        echo view('section/sidebar');
        echo view('edit_pages/data_produk_edit', $data);
        echo view('section/footer');
    }

    public function edit($id) {
        $kode = $this->request->getPost('kode');
        $produk = $this->request->getPost('namaproduk');
        $kategori = $this->request->getPost('kategori');
        $harga = $this->request->getPost('hargasatuan');
        $jumlah = $this->request->getPost('jumlahstok');

        $this->produkModel->updateProduk($id, $kode, $produk, $kategori, $harga, $jumlah);
        return redirect()->to('/data_produk');
    }

    public function hapusproduk($id) {
        $this->produkModel->deleteProduk($id);
        return redirect()->to('/data_produk');
    }
}
