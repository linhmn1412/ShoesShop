<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";

    protected $primaryKey = "id_user";

    public $timestamps = false;
    
    public function order()
    {
        return $this->hasMany(Order::class, 'id_user', 'id_user');
    }

    protected $fillable = [
        'fullname', 
        'email', 
        'phone_number',  
        'username', 
        'password',
        'id_role',
    ];

}
