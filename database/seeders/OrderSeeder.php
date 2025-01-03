<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Order;
use App\Models\Payment;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $users = User::all();
        $kategoris = Kategori::all();
        $produks = Produk::all();

        $ordersCreated = 0;

        // Seed 16 orders
        while ($ordersCreated < 16) {
            // Randomly pick a user, category, and product
            $user = $users->random();
            $kategori = $kategoris->random();
            $produk = $produks->random();

            $quantity = $faker->numberBetween(1, 5);
            $total_harga = $produk->harga * $quantity;
            $diskon = $faker->randomElement([null, $faker->numberBetween(5, 50)]);
            $final_harga = $diskon ? $total_harga - ($total_harga * $diskon / 100) : $total_harga;

            // Insert into the orders table
            $order = Order::create([
                'user_id' => $user->id,
                'kategori_id' => $kategori->id,
                'produk_id' => $produk->id,
                'akun_game' => $faker->userName,
                'quantity' => $quantity,
                'total_harga' => $total_harga,
                'kupon' => $faker->word,
                'diskon' => $diskon,
                'final_harga' => $final_harga,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Insert into the payments table
            Payment::create([
                'order_id' => $order->id,
                'bukti_pembayaran' => $faker->imageUrl(),
                'status' => 'Terbayar',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $ordersCreated++;
        }
    }
}
