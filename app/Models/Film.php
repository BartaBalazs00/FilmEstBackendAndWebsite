<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['cim', 'leiras', 'megjelenesiEv', 'ertekeles', 'imageUrl'];

    protected $visible = [
        'id',
        'cim',
        'leiras',
        'megjelenesiEv',
        'ertekeles',
        'imageUrl'
    ];
}
