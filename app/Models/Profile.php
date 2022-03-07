<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ? '/storage/'.$this->image : '/img/DefaultProfileImage.jpg';
        return $imagePath;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
