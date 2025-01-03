<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Produk;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $users = User::all();
        $kategoris = Kategori::all();
        $produks = Produk::all();

        $ordersCreated = 0;
        foreach ($users as $user) {
            foreach ($kategoris as $kategori) {
                foreach ($produks as $produk) {

                    if ($ordersCreated >= 16) {
                        return;
                    }

                    $quantity = $faker->numberBetween(1, 5);
                    $total_harga = $produk->harga * $quantity;
                    $diskon = $faker->randomElement([null, $faker->numberBetween(5, 50)]);
                    $final_harga = $diskon ? $total_harga - ($total_harga * $diskon / 100) : $total_harga;

                    DB::table('orders')->insert([
                        'user_id' => $user->id,
                        'kategori_id' => $kategori->id,
                        'produk_id' => $produk->id,
                        'akun_game' => $faker->userName,
                        'quantity' => $quantity,
                        'total_harga' => $total_harga,
                        'kupon' => $faker->word,
                        'diskon' => $diskon,
                        'final_harga' => $final_harga,
                        'bukti_pembayaran' => $faker->imageUrl(),
                        'status' => 'Terbayar',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    $ordersCreated++;
                }
            }
        }
    }
}
