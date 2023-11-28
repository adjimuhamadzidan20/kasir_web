<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class TransaksiModel extends Model
{
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id_transaksi';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_produk', 'harga', 'qty', 'total'];

    public function fetchTransaksi() {
        $sql = "SELECT transaksi.id_transaksi, transaksi.id_produk, data_produk.nama_produk, transaksi.harga, transaksi.qty, 
        transaksi.total FROM transaksi INNER JOIN data_produk ON transaksi.id_produk = data_produk.id_produk";
        return $this->query($sql)->getResultArray();
    }

    public function addList($produk, $harga, $qty, $total) {
        $data = [
            'id_produk' => $produk,
            'harga' => $harga,
            'qty' => $qty,
            'total' => $total
        ];

        return $this->insert($data);
    }

    public function hitungTotal() {
        return $this->findAll();
    }

    public function reset() {
        $sql = "TRUNCATE TABLE transaksi";
        return $this->query($sql);
    }
}
