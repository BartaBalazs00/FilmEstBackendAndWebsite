<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoriak extends Model
{
    use HasFactory;

    protected $table="kategoriak";
    protected $fillable = ["kategoria"];

    protected $visible = [
        'id',
        'kategoria'
    ];
}
