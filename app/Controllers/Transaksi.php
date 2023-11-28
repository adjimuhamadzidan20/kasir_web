<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataprodukModel;
use App\Models\TransaksiModel;

// defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends BaseController
{
    protected $produkModel;
    protected $transaksiModel;

    public function __construct() {
        $this->produkModel = new DataprodukModel();
        $this->transaksiModel = new TransaksiModel();
    }

    public function transaksi()
    {
        $data = [
            'title' => 'Transaksi',
            'produk' => $this->produkModel->fetchProduk(),
        ];

        echo view('section/header', $data);
        echo view('section/sidebar');
        echo view('transaksi_view', $data);
        echo view('section/footer');
    }

    public function getTransaksi() {
        $data = $this->transaksiModel->fetchTransaksi();
        return $this->response->setJSON($data);
    }

    public function listHarga($item) {
        $harga = $this->produkModel->find($item)['harga_satuan'];
        return $this->response->setJSON(['harga_satuan' => $harga]);
    }

    public function simpanList() {
        $produk = $this->request->getPost('produk');
        $harga = $this->request->getPost('harga');
        $qty = $this->request->getPost('qty');
        $total = $harga * $qty;

        $data = $this->transaksiModel->addList($produk, $harga, $qty, $total);
        return $this->response->setJSON($data);
    }

    public function hapusList($id) {
        $data = $this->transaksiModel->delete($id);
        return $this->response->setJSON($data);
    }

    public function jumlahTotal() {
        $data = $this->transaksiModel->hitungTotal();
        $total = array_sum(array_column($data, 'total'));
        return $this->response->setJSON(['jumlah' => $total]);

    }

    public function resetList() {
        $this->transaksiModel->reset();
        return redirect()->to('/transaksi');
    }
}
