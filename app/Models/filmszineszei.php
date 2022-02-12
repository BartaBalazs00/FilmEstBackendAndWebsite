<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filmszineszei extends Model
{
    use HasFactory;

    protected $table="filmszineszei";

    protected $visible = [
        'filmID',
        'szineszId'
    ];
}
