<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function generateOrderCode()
    {
        $latestOrder = self::latest('id')->first();
        $number = $latestOrder ? (intval(substr($latestOrder->order_code, -4)) + 1) : 1;
        return 'tiket-' . str_pad($number, 4, '0', STR_PAD_LEFT);
    }
}
