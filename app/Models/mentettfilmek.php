<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mentettfilmek extends Model
{
    use HasFactory;

    protected $fillable = ['userId',"filmId"];

    protected $visible = [
        'userId',
        'filmId'
    ];
}
