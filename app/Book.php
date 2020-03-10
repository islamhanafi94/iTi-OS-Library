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
}
