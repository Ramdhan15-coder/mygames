<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $produkData = [
            ['kategori_id' => 1, 'produk' => '200', 'satuan' => 'diamond', 'harga' => 10000.00, 'stok' => 50],
            ['kategori_id' => 1, 'produk' => '500', 'satuan' => 'diamond', 'harga' => 25000.00, 'stok' => 30],
            ['kategori_id' => 1, 'produk' => '1000', 'satuan' => 'diamond', 'harga' => 45000.00, 'stok' => 20],
            ['kategori_id' => 2, 'produk' => '300', 'satuan' => 'diamond', 'harga' => 15000.00, 'stok' => 40],
            ['kategori_id' => 2, 'produk' => '600', 'satuan' => 'diamond', 'harga' => 28000.00, 'stok' => 25],
            ['kategori_id' => 2, 'produk' => '1200', 'satuan' => 'diamond', 'harga' => 50000.00, 'stok' => 15],
            ['kategori_id' => 3, 'produk' => '250', 'satuan' => 'diamond', 'harga' => 12000.00, 'stok' => 45],
            ['kategori_id' => 3, 'produk' => '750', 'satuan' => 'diamond', 'harga' => 30000.00, 'stok' => 35],
            ['kategori_id' => 3, 'produk' => '1500', 'satuan' => 'diamond', 'harga' => 60000.00, 'stok' => 10],
        ];

        foreach ($produkData as $produk) {
            DB::table('produks')->insert([
                'kategori_id' => $produk['kategori_id'],
                'produk' => $produk['produk'],
                'satuan' => $produk['satuan'],
                'harga' => $produk['harga'],
                'stok' => $produk['stok'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
