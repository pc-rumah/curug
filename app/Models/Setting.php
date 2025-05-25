<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_halaman',
        'text_sambutan',
        'desc_sambutan',
        'sampul',
        'desc_web',
        'alamat',
        'phone',
        'email',
        'twitter',
        'facebook',
        'instagram',
    ];
}
