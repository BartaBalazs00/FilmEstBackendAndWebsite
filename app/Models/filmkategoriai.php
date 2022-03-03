<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filmkategoriai extends Model
{
    use HasFactory;

    protected $table="filmkategoriai";

    protected $visible = [
        'filmId',
        'kategoriaId'
    ];
}
