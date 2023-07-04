<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'orderdetail';

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order', 'id_order');
    }

    public function product()
    {
        return $this->belongsTo(Shoe::class, 'id_shoe', 'id_shoe');
    }
    public $timestamps = false;

    protected $fillable = [
        'id_order',
        'id_shoe',
        'quantity',
        'cur_price'
    ];
}
