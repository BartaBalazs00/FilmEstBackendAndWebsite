<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable = ["Cim", "leiras", "MegjelenesiEv", "Ertekeles", "imageUrl", "Kategoria", "szineszNev", "rendezoNev"];

    protected $visible = [
        "Cim",
        "leiras",
        "MegjelenesiEv",
        "Ertekeles",
        "imageUrl",
        "Kategoria",
        "szineszNev",
        "rendezoNev"
    ];
}
