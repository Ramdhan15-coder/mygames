<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kupon;

class KuponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Kupon::factory()->count(10)->create();
    }
}
