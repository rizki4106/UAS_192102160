<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $fillable = ['nama_dosen', 'slug', 'jenis_kelamin', 'alamat', 'nomor_telepon', 'email', 'published_at'];
}
