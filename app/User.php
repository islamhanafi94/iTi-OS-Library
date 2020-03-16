<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function favorites()
    {
        return $this->belongsToMany('App\Book', 'favorites', 'user_id', 'book_id')->withTimestamps();
    }

    public function leases()
    {
        return $this->belongsToMany('App\Book', 'leases', 'user_id', 'book_id')->withPivot('leased_date', 'days', 'cost')->withTimestamps();
    }
    
    public function comments()
    {
        return $this->belongsToMany('App\Comment', 'comments', 'user_id', 'book_id')->withTimestamps();
    }

}
