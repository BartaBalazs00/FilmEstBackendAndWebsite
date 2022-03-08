<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoriak extends Model
{
    public $timestamps = false;
    protected $table="kategoriak";
    protected $fillable = ["kategoria"];

    protected $visible = [
        'id',
        'kategoria'
    ];

    public function filmek()
    {
        return $this->belongsToMany(Film::class, "filmszineszei", "kategoriaId", "filmId");
    }
}
