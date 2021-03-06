<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];
    protected $visible = [
        'id',
        'email',
        'permission'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected static function boot(){

        parent::boot();

        static::created(function ($user){
            $user->profile()->create([
                'leiras' => $user->username,
            ]);
        });
    }

    public function filmek()
    {
        return $this->belongsToMany(Film::class, "mentettfilmek", "user_id", "film_id")->orderBy('created_at', 'DESC');
    }
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }

    public static function getMentettFilmek(User $user){
        $mentettFilmek = Film::whereHas('user',function($q) use($user) {
            $q->where('user_id', $user->id);
        })->get();
        $mentettFilmek = $mentettFilmek->reverse();
        return $mentettFilmek;
    }
}
