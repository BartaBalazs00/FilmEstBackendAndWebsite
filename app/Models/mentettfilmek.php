<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Void_;

class mentettfilmek extends Model
{
    use HasFactory;

    protected $table="mentettfilmek";

    protected $visible = [
        'user_id',
        'film_id'
    ];
}
