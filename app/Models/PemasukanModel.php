<?php

namespace App\Models;

use CodeIgniter\Model;

class PemasukanModel extends Model
{
    protected $table            = 'pemasukan';
    protected $primaryKey       = 'id_pemasukan';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    // protected $useTimestamps    = true;
    protected $allowedFields    = ['tanggal_pemasukan', 'bulan_pemasukan', 'jumlah_nominal'];
   
    public function fetchPemasukan() {
        return $this->findAll();
    }

    public function addPemasukan($tglPem, $blnPem, $tunaiPem) {
        $data = [
            'tanggal_pemasukan' => $tglPem,
            'bulan_pemasukan' => $blnPem,
            'jumlah_nominal' => $tunaiPem
        ];

        return $this->insert($data);
    }

    public function filterPemasukan($bln, $thn) {
        $sql = "SELECT * FROM pemasukan WHERE bulan_pemasukan LIKE '%$bln%' AND tanggal_pemasukan LIKE '%$thn%'";
        return $this->query($sql)->getResultArray();
    }
}
