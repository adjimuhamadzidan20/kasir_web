<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PemasukanModel;

class LaporanPemasukan extends BaseController
{
    protected $pemasukanModel;

    public function __construct() {
        $this->pemasukanModel = new PemasukanModel();
    }    

    public function laporanpemasukan()
    {
        $bulan = $this->request->getGet('bulan');
        $tahun = $this->request->getGet('tahun');

        if ($bulan) {
            $hasil = $this->pemasukanModel->filterPemasukan($bulan, $tahun);
            $total = array_sum(array_column($hasil, 'jumlah_nominal'));    
        } else {
            $hasil = $this->pemasukanModel->fetchPemasukan();
            $total = array_sum(array_column($hasil, 'jumlah_nominal'));
        }

        $data = [
            'title' => 'Laporan Pemasukan',
            'pemasukan' => $hasil,
            'total' => $total
        ];

        echo view('section/header', $data);
        echo view('section/sidebar');
        echo view('laporanpemasukan_view', $data);
        echo view('section/footer');
    }

    public function tambahPemasukan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tglPemasukan = date('Y/m/d h:i:sa');
        $blnPemasukan = date('M');
        $tunaiPemasukan = $this->request->getPost('tunai');

        $data = $this->pemasukanModel->addPemasukan($tglPemasukan, $blnPemasukan, $tunaiPemasukan);
        return $this->response->setJSON($data);
    }

    public function cetakLapPemasukan($bln = null, $thn = null) {
        $bulan = $bln;
        $tahun = $thn;

        if ($bulan) {
            $hasil = $this->pemasukanModel->filter($bulan, $tahun);
            $total = array_sum(array_column($hasil, 'jumlah_nominal'));    
        } else {
            $hasil = $this->pemasukanModel->fetchPemasukan();
            $total = array_sum(array_column($hasil, 'jumlah_nominal'));
        }

        $data = [
            'title' => 'Laporan Pemasukan',
            'pemasukan' => $hasil,
            'total' => $total
        ];

        echo view('section/header', $data);
        echo view('laporan/cetak_pemasukan', $data);
        echo view('section/footer_laporan');
    } 
}
