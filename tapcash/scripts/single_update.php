<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Tapcash;
use Illuminate\Support\Facades\DB;

$id = 2;
$r = Tapcash::find($id);
if (!$r) { echo "Not found\n"; exit; }
echo "orig: " . $r->getOriginal('status') . PHP_EOL;
echo "computed: " . $r->determineStatus() . PHP_EOL;
$r->status = $r->determineStatus();
$r->save();
// reload raw from DB
$raw = DB::table('tapcash')->where('id',$id)->first();
echo "db now: " . $raw->status . PHP_EOL;
