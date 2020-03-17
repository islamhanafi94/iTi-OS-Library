<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $table = 'books';

    // to accept mass assignment
    protected $fillable = ['title','author','stock','category_id',
                'available_copies','lease_price_per_day',
                'image','description'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function favoritedBy()
    {
        return $this->belongsToMany('App\User', 'favorites', 'book_id', 'user_id');
    }

    public function leasedBy()
    {
        return $this->belongsToMany('App\User', 'leases', 'book_id', 'user_id');//->withPivot('leased_date', 'days', 'cost')->withTimestamps();
    }

    public function commentedBy()
    {
        return $this->belongsToMany('App\User', 'comments', 'book_id', 'user_id');
    }

}
