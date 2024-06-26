<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nomor_hp',
        'perihal',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
