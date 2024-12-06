<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Izinkan mass assignment untuk kolom berikut
    protected $fillable = ['nama', 'nim', 'email'];
}
