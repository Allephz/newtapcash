<?php
require __DIR__ . '/../vendor/autoload.php';

// bootstrap the framework
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$rows = DB::table('tapcash')->get();
foreach ($rows as $r) {
    echo $r->id . ' | ' . ($r->tanggal_expired ?? 'NULL') . ' | DB_STORED:' . ($r->status ?? 'NULL') . PHP_EOL;
}
