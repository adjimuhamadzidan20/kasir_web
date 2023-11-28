<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class DataprodukModel extends Model
{
    protected $table            = 'data_produk';
    protected $primaryKey       = 'id_produk';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = ['kode_produk', 'nama_produk', 'id_kategori', 'harga_satuan', 'jumlah_stok'];
   
    public function fetchProduk() {
        $sql = "SELECT data_produk.id_produk, data_produk.nama_produk, data_kategori.kategori, data_produk.harga_satuan, 
        data_produk.jumlah_stok, CONCAT ('PR0', id_produk) AS kode FROM data_produk INNER JOIN data_kategori ON 
        data_produk.id_kategori = data_kategori.id_kategori";
        
        return $this->query($sql)->getResultArray();
    } 

    public function fetchIdProduk($id) {
        $db = \Config\Database::connect();
        $produk = $this->db->table('data_produk');

        $produk->select('data_produk.id_produk, data_produk.nama_produk, data_kategori.kategori, data_kategori.id_kategori,
        data_produk.harga_satuan, data_produk.jumlah_stok, CONCAT ("PR0", id_produk) AS kode');

        $produk->join('data_kategori', 'data_produk.id_kategori = data_kategori.id_kategori', 'inner');
        $produk->where('id_produk', $id);

        $query = $produk->get();
        return $query;
    }

    public function addProduk($kode, $produk, $kategori, $harga, $jumlah) {
        $dataPro = [
            'kode_produk' => $kode,
            'nama_produk' => $produk,
            'id_kategori' => $kategori,
            'harga_satuan' => $harga,
            'jumlah_stok' => $jumlah,
        ];
        return $this->insert($dataPro);
    }

    public function updateProduk($id, $kode, $produk, $kategori, $harga, $jumlah) {
        $dataPro = [
            'kode_produk' => $kode,
            'nama_produk' => $produk,
            'id_kategori' => $kategori,
            'harga_satuan' => $harga,
            'jumlah_stok' => $jumlah,
        ];
        return $this->update($id, $dataPro);
    }

    public function deleteProduk($id) {
        return $this->delete($id);
    }
}
