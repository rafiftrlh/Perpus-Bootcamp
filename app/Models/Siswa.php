<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'siswas';
}
