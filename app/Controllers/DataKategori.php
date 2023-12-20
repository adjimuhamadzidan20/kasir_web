<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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
        $res = $this->kategoriModel->addKategori($kode, $kategori);

        if ($res) {
            $pesan = 'Kategori berhasil tersimpan!';
            session()->setFlashData('sukses', $pesan);
            return redirect()->to('/data_kategori');
        } else {
            $pesan = 'Kategori gagal tersimpan!';
            session()->setFlashData('gagal', $pesan);
            return redirect()->to('/data_kategori');
        }
    }

    public function editkategori($id) {
        $getKategori = $this->kategoriModel->fetchIdKategori($id)->getRow();
        $data = [
            'title' => 'Edit Kategori',
            'title2' => 'Data Kategori',
            'kategori' => $getKategori
        ];

        echo view('section/header', $data);
        echo view('section/sidebar');
        echo view('edit_pages/data_kategori_edit', $data);
        echo view('section/footer');
    }

    public function edit($id) {
        $kategori = $this->request->getPost('kategori');
        $res = $this->kategoriModel->updateKategori($id, $kategori);
        
        if ($res) {
            $pesan = 'Kategori berhasil terubah!';
            session()->setFlashData('sukses', $pesan);
            return redirect()->to('/data_kategori');
        } else {
            $pesan = 'Kategori gagal terubah!';
            session()->setFlashData('gagal', $pesan);
            return redirect()->to('/data_kategori');
        }
    }

    public function hapuskategori($id) {
        $res = $this->kategoriModel->deleteKategori($id);

        if ($res) {
            $pesan = 'Kategori berhasil terhapus!';
            session()->setFlashData('sukses', $pesan);
            return redirect()->to('/data_kategori');
        } else {
            $pesan = 'Kategori gagal terhapus!';
            session()->setFlashData('gagal', $pesan);
            return redirect()->to('/data_kategori');
        }
    }
}
