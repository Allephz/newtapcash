<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Tapcash;
use Illuminate\Support\Facades\DB;

$rows = DB::table('tapcash')->get();
foreach ($rows as $r) {
    $model = Tapcash::find($r->id);
    $computed = $model ? $model->determineStatus() : 'N/A';
    echo $r->id . ' | ' . ($r->tanggal_expired ?? 'NULL') . ' | DB_STORED:' . ($r->status ?? 'NULL') . ' | COMPUTED:' . $computed . PHP_EOL;
}
