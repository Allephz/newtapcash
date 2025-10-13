<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Tapcash;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


// Perintah singkat untuk memperbarui kolom `status` di tabel `tapcash` berdasarkan tanggal_expired
Artisan::command('tapcash:update-status', function () {
    $this->info('Mulai memperbarui status Tapcash...');
    $updated = 0;
    Tapcash::chunkById(100, function($rows) use (&$updated) {
        foreach ($rows as $r) {
            $new = $r->determineStatus();
            $orig = $r->getOriginal('status');
            if ($orig !== $new) {
                $r->update(['status' => $new]);
                $updated++;
                $this->line("Updated id {$r->id}: {$orig} -> {$new}");
            }
        }
    });
    $this->info("Selesai. Baris yang diubah: {$updated}");
})->describe('Perbarui kolom status Tapcash berdasarkan tanggal_expired');
