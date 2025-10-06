<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tipe')->insert([
            ['nama_tipe' => 'genta'],
            ['nama_tipe' => 'kapal'],
            ['nama_tipe' => 'dinas kapal'],
        ]);
    }
}
