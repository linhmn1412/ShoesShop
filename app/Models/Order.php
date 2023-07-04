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

    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class, 'id_order','id_order');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user','id_user');
    }

    protected $fillable = [
        'id_user',
        'name_buyer',
        'phone_number', 
        'address', 
        'note', 
        'total', 
        'payment', 
        'status'
    ];
}
