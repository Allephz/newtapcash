<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TapcashSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tapcash')->insert([
            [
                'no_tapcash' => '1234567890',
                'uid' => 'UID001',
                'tipe' => 'genta',
                'tanggal_expired' => Carbon::now()->addYear(),
                'nama' => 'Budi',
                'npp' => 'NPP001',
                'keterangan' => 'aktif',
                'perusahaan' => 'Pelindo',
                'status' => 'ACTIVE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_tapcash' => '2345678901',
                'uid' => 'UID002',
                'tipe' => 'kapal',
                'tanggal_expired' => Carbon::now()->subMonth(),
                'nama' => 'Sari',
                'npp' => 'NPP002',
                'keterangan' => 'expired',
                'perusahaan' => 'Pelindo',
                'status' => 'EXPIRED',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_tapcash' => '3456789012',
                'uid' => 'UID003',
                'tipe' => 'dinas kapal',
                'tanggal_expired' => Carbon::now()->addMonths(6),
                'nama' => 'Andi',
                'npp' => 'NPP003',
                'keterangan' => 'aktif',
                'perusahaan' => 'Pelindo',
                'status' => 'ACTIVE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
