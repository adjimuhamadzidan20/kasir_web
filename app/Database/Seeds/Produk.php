<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Produk extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=0; $i <= 50; $i++) { 
             $dataProduk = [
                'kode_produk' => 'PR0',
                'nama_produk' => $faker->company,
                'id_kategori' => $faker->randomElement([1, 2, 3, 4]),
                'harga_satuan' => $faker->randomElement([10000, 12000, 15000, 22000, 25000]),
                'jumlah_stok' => $faker->randomElement([200, 40, 20, 150, 220, 180, 500]),
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now()
            ];
            
            $this->db->table('data_produk')->insert($dataProduk);
        }
    }
}
