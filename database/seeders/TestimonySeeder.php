<?php

namespace Database\Seeders;

use App\Models\Testimony;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimony::factory(300)->create();
    }
}
