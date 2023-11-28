<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Models;
use App\Models\DatakategoriModel;

class DataKategori extends BaseController
{
    protected $kategoriModel;

    public function __construct() {
        $this->kategoriModel = new DatakategoriModel();
    }

    public function datakategori()
    {
        $data = [
            'title' => 'Kategori',
            'kategori' => $this->kategoriModel->fetchKategori()
        ];

        echo view('section/header', $data);
        echo view('section/sidebar');
        echo view('data_kategori_view', $data);
        echo view('section/footer');
    }

    public function tambah() {
        $kode = 'KAT0';
        $kategori = $this->request->getPost('kategori');
        $this->kategoriModel->addKategori($kode, $kategori);
        return redirect()->to('/data_kategori');
    }

    public function editkategori($id) {
        $getKategori = $this->kategoriModel->fetchIdKategori($id)->getRow();
        $data = [
            'title' => 'Kategori',
            'kategori' => $getKategori
        ];

        echo view('section/header', $data);
        echo view('section/sidebar');
        echo view('edit_pages/data_kategori_edit', $data);
        echo view('section/footer');
    }

    public function edit($id) {
        $kode = $this->request->getPost('kategori');
        $kategori = $this->request->getPost('kategori');

        $this->kategoriModel->updateKategori($id, $kode, $kategori);
        return redirect()->to('/data_kategori');
    }

    public function hapuskategori($id) {
        $this->kategoriModel->deleteKategori($id);
        return redirect()->to('/data_kategori');
    }
}
