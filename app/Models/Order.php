<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function generateOrderCode()
    {
        $timestamp = now()->format('YmdHis'); // contoh: 20250527150130
        $random = strtoupper(Str::random(4)); // contoh: A9Z3
        return 'tiket-' . $timestamp . '-' . $random;
    }
}
