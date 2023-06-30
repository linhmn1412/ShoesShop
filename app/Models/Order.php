<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";

    protected $primaryKey = "id_order";

    public $timestamps = true;

    protected $fillable = [
        'name_buyer',
        'phone_number', 
        'address', 
        'note', 
        'total', 
        'payment', 
        'detail_order',
        'status'
    ];
}
