<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class szineszek extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table="szineszek";
    protected $fillable = ["szineszNev"];

    protected $visible = [
        'id',
        'szineszNev'
    ];
    public function filmek()
    {
        return $this->belongsToMany(Film::class, "filmszineszei", "szineszId", "filmId");
    }
}
