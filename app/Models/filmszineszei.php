<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filmszineszei extends Model
{
    use HasFactory;

    protected $fillable = ['filmId',"szineszId"];

    protected $visible = [
        'filmID',
        'szineszId'
    ];
}
