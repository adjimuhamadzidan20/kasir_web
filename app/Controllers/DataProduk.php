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
        $res = $this->produkModel->addProduk($kode, $produk, $kategori, $harga, $jumlah);
        
        if ($res) {
            $pesan = 'Produk berhasil tersimpan!';
            session()->setFlashData('sukses', $pesan);
            return redirect()->to('/data_produk');
        } else {
            $pesan = 'Produk gagal tersimpan!';
            session()->setFlashData('gagal', $pesan);
            return redirect()->to('/data_produk');
        }   
    }

    public function editproduk($id) {
        $getIdProduk = $this->produkModel->fetchIdProduk($id)->getRow();
        $getKategori = $this->kategoriModel->fetchKategori();

        $data = [
            'title' => 'Edit Produk',
            'title2' => 'Data produk',
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
        $res = $this->produkModel->updateProduk($id, $kode, $produk, $kategori, $harga, $jumlah);
        
        if ($res) {
            $pesan = 'Produk berhasil terubah!';
            session()->setFlashData('sukses', $pesan);
            return redirect()->to('/data_produk');
        } else {
            $pesan = 'Produk gagal terubah!';
            session()->setFlashData('gagal', $pesan);
            return redirect()->to('/data_produk');
        }
    }

    public function hapusproduk($id) {
        $res = $this->produkModel->deleteProduk($id);

        if ($res) {
            $pesan = 'Produk berhasil terhapus!';
            session()->setFlashData('sukses', $pesan);
            return redirect()->to('/data_produk');
        } else {
            $pesan = 'Produk gagal terhapus!';
            session()->setFlashData('gagal', $pesan);
            return redirect()->to('/data_produk');
        }
    }
}
