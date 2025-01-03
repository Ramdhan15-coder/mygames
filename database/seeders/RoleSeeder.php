<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['nama_role' => 'Super Admin', 'deskripsi' => 'Hak akses tertinggi'],
            ['nama_role' => 'Admin', 'deskripsi' => 'Admin verifikasi pesanan'],
            ['nama_role' => 'Pengguna', 'deskripsi' => 'Pengguna atau pembeli'],
        ];

        DB::table('roles')->insert($roles);
    }
}
