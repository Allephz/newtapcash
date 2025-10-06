<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use App\Models\Tapcash;

DB::listen(function ($query) {
    echo "SQL: {$query->sql} | Bindings: " . json_encode($query->bindings) . "\n";
});

$id = 3; // coba id yang computed EXPIRED tapi DB ACTIVE
$r = Tapcash::find($id);
if (! $r) {
    echo "Not found\n";
    exit;
}

echo "Before - id={$id} orig=" . $r->getOriginal('status') . " computed=" . $r->determineStatus() . PHP_EOL;

$r->status = $r->determineStatus();
$r->save();

echo "After save - getOriginal=" . $r->getOriginal('status') . "\n";
$raw = DB::table('tapcash')->where('id', $id)->first();
echo "Raw DB row status= " . $raw->status . PHP_EOL;
