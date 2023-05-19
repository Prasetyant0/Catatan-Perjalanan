<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perjalanan extends Model
{
    use HasFactory;

    protected $table = 'perjalanans';

    protected $fillable = [
        'user_id',
        'tanggal',
        'waktu',
        'suhu',
        'lokasi',
        'tujuan',
    ];

    public function alldata()
    {
        return DB::table('perjalanans')->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
