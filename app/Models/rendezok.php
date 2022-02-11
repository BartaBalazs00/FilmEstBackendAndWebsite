<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rendezok extends Model
{
    use HasFactory;

    protected $fillable = ['id',"rendezoNev"];

    protected $visible = [
        'id',
        'rendezoNev'
    ];
}
