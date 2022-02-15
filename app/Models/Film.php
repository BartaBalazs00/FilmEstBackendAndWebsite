<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table="filmek";
    protected $fillable = ['cim', 'leiras', 'megjelenesiEv', 'ertekeles', 'imageUrl'];

    protected $visible = [
        'id',
        'cim',
        'leiras',
        'megjelenesiEv',
        'ertekeles',
        'imageUrl'
    ];

    public function kategoriak()
    {
        return $this->belongsToMany(kategoriak::class, "filmkategoriai", "filmId", "kategoriaId");
    }
    public function rendezok()
    {
        return $this->belongsToMany(rendezok::class, "filmrendezoi", "filmId", "rendezoId");
    }
    public function szineszek()
    {
        return $this->belongsToMany(szineszek::class, "filmszineszei", "filmId", "szineszId");
    }
}
