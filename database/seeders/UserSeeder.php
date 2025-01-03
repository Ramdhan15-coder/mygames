<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['name' => 'Super Admin 1', 'email' => 'superadmin@gmail.com', 'password' => bcrypt('password'), 'role_id' => 1],
            ['name' => 'Admin 1', 'email' => 'admin@gmail.com', 'password' => bcrypt('password'), 'role_id' => 2],
            ['name' => 'Farsya User', 'email' => 'farsya@gmail.com', 'password' => bcrypt('password'), 'role_id' => 3],
            ['name' => 'Tika User', 'email' => 'tika@gmail.com ', 'password' => bcrypt('password'), 'role_id' => 3],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        User::factory()->count(12)->create();
    }
}
