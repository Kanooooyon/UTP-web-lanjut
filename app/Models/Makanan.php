<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nama_makanan', 'kalori', 'waktu_makan', 'tanggal'
    ];
}
