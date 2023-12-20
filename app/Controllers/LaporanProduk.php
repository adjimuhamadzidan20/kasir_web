<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataprodukModel;
use App\Models\DatakategoriModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class LaporanProduk extends BaseController
{
    protected $produkModel;
    protected $kategoriModel;
    protected $fileExcel;

    public function __construct() {
        $this->produkModel = new DataprodukModel();
        $this->kategoriModel = new DatakategoriModel();
        $this->fileExcel = new Spreadsheet();
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

    // cetak pdf
    public function cetakLapProdukPdf($jenis = null) {
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

    // cetak excel
    public function cetakLapProdukExcel($jenis = null) {
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        $tgl1 = strftime("%A, %d %B %Y | %T");

        $kategori = $jenis;

        if ($kategori) {
            $hasil = $this->produkModel->filterProduk($kategori);
        } else {
            $hasil = $this->produkModel->fetchProduk();
        }

        $this->fileExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Laporan Data Produk')
                ->setCellValue('A2', $tgl1)
                ->setCellValue('A4', 'Kode')
                ->setCellValue('B4', 'Nama Produk')
                ->setCellValue('C4', 'Kategori')
                ->setCellValue('D4', 'Harga Satuan')
                ->setCellValue('E4', 'Jumlah Stok');

        $column = 5;
        // tulis data mobil ke cell
        foreach($hasil as $data) {
            $this->fileExcel->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $data['kode'])
                        ->setCellValue('B' . $column, $data['nama_produk'])
                        ->setCellValue('C' . $column, $data['kategori'])
                        ->setCellValue('D' . $column, $data['harga_satuan'])
                        ->setCellValue('E' . $column, $data['jumlah_stok']);
            $column++;
        }

        // tulis dalam format .xlsx
        $writer = new Xlsx($this->fileExcel);
        $fileName = 'E-Kasir_Laporan Produk';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
