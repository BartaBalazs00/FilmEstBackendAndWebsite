<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filmrendezoi extends Model
{
    use HasFactory;

    protected $table="filmrendezoi";

    protected $visible = [
        'filmId',
        'rendezoId'
    ];
}
