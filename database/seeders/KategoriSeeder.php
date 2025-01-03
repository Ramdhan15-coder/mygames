<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            [
                'nama' => 'Free Fire',
                'deskripsi' => 'Game battle royale populer dengan gameplay cepat.',
                'image' => 'images/kategoris/free_fire.jpg',
            ],
            [
                'nama' => 'PUBG Mobile',
                'deskripsi' => 'Game battle royale dengan grafis realistis dan map yang luas.',
                'image' => 'images/kategoris/pubg_mobile.jpg',
            ],
            [
                'nama' => 'Mobile Legends',
                'deskripsi' => 'Game MOBA 5v5 dengan berbagai hero unik.',
                'image' => 'images/kategoris/mobile_legends.jpg',
            ],
            [
                'nama' => 'Call of Duty Mobile',
                'deskripsi' => 'Game FPS dengan berbagai mode permainan seru.',
                'image' => 'images/kategoris/call_of_duty.jpg',
            ],
            [
                'nama' => 'Genshin Impact',
                'deskripsi' => 'Game RPG open-world dengan grafis memukau.',
                'image' => 'images/kategoris/genshin_impact.jpg',
            ],
            [
                'nama' => 'Clash of Clans',
                'deskripsi' => 'Game strategi membangun desa dan menyerang lawan.',
                'image' => 'images/kategoris/clash_of_clans.jpg',
            ],
            [
                'nama' => 'Clash Royale',
                'deskripsi' => 'Game strategi real-time dengan elemen kartu.',
                'image' => 'images/kategoris/clash_royale.jpg',
            ],
            [
                'nama' => 'Among Us',
                'deskripsi' => 'Game deduksi sosial yang penuh intrik.',
                'image' => 'images/kategoris/among_us.jpg',
            ],
            [
                'nama' => 'Minecraft',
                'deskripsi' => 'Game sandbox kreatif dengan berbagai mode.',
                'image' => 'images/kategoris/minecraft.jpg',
            ],
            [
                'nama' => 'Roblox',
                'deskripsi' => 'Platform game dengan berbagai game buatan pengguna.',
                'image' => 'images/kategoris/roblox.jpg',
            ],
            [
                'nama' => 'Apex Legends Mobile',
                'deskripsi' => 'Game battle royale dengan karakter unik dan mekanik khusus.',
                'image' => 'images/kategoris/apex_legends_mobile.jpg',
            ],
            [
                'nama' => 'League of Legends: Wild Rift',
                'deskripsi' => 'Game MOBA dengan strategi tingkat tinggi.',
                'image' => 'images/kategoris/wild_rift.jpg',
            ],
            [
                'nama' => 'Fortnite',
                'deskripsi' => 'Game battle royale dengan mekanik membangun dan grafis penuh warna.',
                'image' => 'images/kategoris/fortnite.jpg',
            ],
            [
                'nama' => 'Valorant Mobile',
                'deskripsi' => 'Game FPS kompetitif dengan agen dan kemampuan unik.',
                'image' => 'images/kategoris/valorant_mobile.jpg',
            ],
            [
                'nama' => 'Candy Crush Saga',
                'deskripsi' => 'Game puzzle adiktif dengan banyak level menantang.',
                'image' => 'images/kategoris/candy_crush.jpg',
            ],
            [
                'nama' => 'Pokémon GO',
                'deskripsi' => 'Game AR yang memungkinkan Anda menangkap Pokémon di dunia nyata.',
                'image' => 'images/kategoris/pokemon_go.jpg',
            ],
        ];

        foreach ($kategoris as $kategori) {
            DB::table('kategoris')->insert([
                'nama' => $kategori['nama'],
                'deskripsi' => $kategori['deskripsi'],
                'image' => $kategori['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
