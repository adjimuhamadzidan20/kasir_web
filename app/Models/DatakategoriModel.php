<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class DatakategoriModel extends Model
{
    protected $table            = 'data_kategori';
    protected $primaryKey       = 'id_kategori';
    protected $allowedFields    = ['kode', 'kategori'];
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    protected $protectFields    = true;
    
    public function fetchKategori() {
        $sql = "SELECT *, CONCAT ('KAT0', id_kategori) AS kode FROM data_kategori";
        return $this->query($sql)->getResultArray();
    } 

    public function fetchIdKategori($id) {
        $db = \Config\Database::connect();
        $kategori = $this->db->table('data_kategori');

        $kategori->select('*, CONCAT ("KAT0", id_kategori) AS kode');
        $kategori->where('id_kategori', $id);
        $query = $kategori->get();
        return $query;
    } 

    public function addKategori($kode, $kategori) {
        $dataKat = [
            'kode' => $kode,
            'kategori' => $kategori
        ];
        return $this->insert($dataKat);
    }

    public function updateKategori($id, $kategori) {
        $dataKat = [
            'kategori' => $kategori
        ];
        return $this->update($id, $dataKat);
    }

    public function deleteKategori($id) {
        return $this->delete($id);
    }

    public function jumlahKategori() {
        $sql = "SELECT * FROM data_kategori";
        $res = $this->query($sql);
        return $res->getNumRows();
    }
}
