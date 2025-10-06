<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tapcash;
use Carbon\Carbon;

class UpdateTapcashStatus extends Command
{
    protected $signature = 'tapcash:update-status';
    protected $description = 'Update status tapcash sesuai tanggal expired';

    public function handle()
    {
        $tapcashList = Tapcash::all();
        foreach ($tapcashList as $tapcash) {
            $newStatus = $tapcash->determineStatus();
            if ($tapcash->status !== $newStatus) {
                $tapcash->status = $newStatus;
                $tapcash->save();
            }
        }
        $this->info('Status tapcash berhasil diupdate.');
    }
}
