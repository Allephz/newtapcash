<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Tapcash;
use Illuminate\Support\Facades\DB;

$updated = 0;
$rows = Tapcash::orderBy('id')->get();
foreach ($rows as $r) {
    $orig = $r->getOriginal('status');
    $new = $r->determineStatus();
    if ($orig !== $new) {
        $r->status = $new;
        $r->save();
        $updated++;
        echo "Updated id {$r->id}: {$orig} -> {$new}\n";
    }
}
echo "Done. Updated: {$updated}\n";
