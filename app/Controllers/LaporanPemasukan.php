<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PemasukanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class LaporanPemasukan extends BaseController
{
    protected $pemasukanModel;
    protected $fileExcel;

    public function __construct() {
        $this->pemasukanModel = new PemasukanModel();
        $this->fileExcel = new Spreadsheet();
    }    

    public function laporanpemasukan()
    {
        $bulan = $this->request->getGet('bulan');
        $tahun = $this->request->getGet('tahun');

        if ($bulan || $tahun) {
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

    // cetak pdf
    public function cetakLapPemasukanPdf($bln = null, $thn = null) {
        $bulan = $bln;
        $tahun = $thn;

        if ($bulan || $tahun) {
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
        echo view('laporan/cetak_pemasukan', $data);
        echo view('section/footer_laporan');
    }

    // cetak excel
    public function cetakLapPemasukanExcel($bln = null, $thn = null) {
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        $tgl1 = strftime("%A, %d %B %Y | %T");

        $bulan = $bln;
        $tahun = $thn;

        if ($bulan || $tahun) {
            $hasil = $this->pemasukanModel->filterPemasukan($bulan, $tahun);
            $total = array_sum(array_column($hasil, 'jumlah_nominal'));    
        } else {
            $hasil = $this->pemasukanModel->fetchPemasukan();
            $total = array_sum(array_column($hasil, 'jumlah_nominal'));
        }

        $this->fileExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Laporan Data Pemasukan')
                ->setCellValue('A2', $tgl1)
                ->setCellValue('A3', 'Total '. $total)
                ->setCellValue('A5', 'Tanggal Pemasukan')
                ->setCellValue('B5', 'Bulan Pemasukan')
                ->setCellValue('C5', 'Nominal');

        $column = 6;
        // tulis data mobil ke cell
        foreach($hasil as $data) {
            $this->fileExcel->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $data['tanggal_pemasukan'])
                        ->setCellValue('B' . $column, $data['bulan_pemasukan'])
                        ->setCellValue('C' . $column, $data['jumlah_nominal']);
            $column++;
        }

        // tulis dalam format .xlsx
        $writer = new Xlsx($this->fileExcel);
        $fileName = 'E-Kasir_Laporan Pemasukan';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    } 
}
