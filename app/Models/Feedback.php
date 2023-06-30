<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = "feedback";

    protected $primaryKey = "id_feedback";

    public $timestamps = true;

    protected $fillable = [
        'id_shoe',
        'id_user',
        'username',
        'rated',
        'comment'
    ];
}
