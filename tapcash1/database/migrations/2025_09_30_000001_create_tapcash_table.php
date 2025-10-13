<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
    Schema::create('tapcashes', function (Blueprint $table) {
            $table->id();
            $table->string('no_tapcash');
            $table->string('uid');
            $table->string('tipe');
            $table->date('tanggal_expired');
            $table->string('nama');
            $table->string('npp');
            $table->string('keterangan');
            $table->string('perusahaan');
            $table->string('status');
            $table->timestamps();
        });
    }
    public function down(): void
    {
    Schema::dropIfExists('tapcashes');
    }
};
