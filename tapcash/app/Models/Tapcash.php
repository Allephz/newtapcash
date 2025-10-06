<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;



class Tapcash extends Model
{
    protected $table = 'tapcash';
    protected $fillable = [
        'no_tapcash', 'uid', 'tipe', 'tanggal_expired', 'nama', 'npp', 'keterangan', 'perusahaan', 'status'
    ];

    // Accessor untuk status otomatis
    public function getStatusAttribute($value)
    {
        // Selalu kembalikan status berdasarkan tanggal_expired (agar tampil konsisten),
        // namun kita juga akan menyimpan nilai yang sama ke database saat membuat/menyimpan model.
        if (!empty($this->attributes['tanggal_expired'])) {
            try {
                $exp = Carbon::parse($this->attributes['tanggal_expired']);
                return $exp->lt(Carbon::today()) ? 'EXPIRED' : 'ACTIVE';
            } catch (\Exception $e) {
                // jika parsing gagal, fallback ke nilai yang tersimpan
            }
        }
        return $value;
    }

    // Boot model untuk mengisi kolom `status` sebelum disimpan ke database
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->status = $model->determineStatus();
        });

        static::updating(function ($model) {
            $model->status = $model->determineStatus();
        });
    }

    // Helper untuk menentukan status berdasarkan tanggal_expired
    public function determineStatus()
    {
        if (!empty($this->tanggal_expired)) {
            try {
                $exp = Carbon::parse($this->tanggal_expired);
                return $exp->lt(Carbon::today()) ? 'EXPIRED' : 'ACTIVE';
            } catch (\Exception $e) {
                // Jika parsing gagal, fallback ke 'ACTIVE'
            }
        }
        return 'ACTIVE';
    }
}
