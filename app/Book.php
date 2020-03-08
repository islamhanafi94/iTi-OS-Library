<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
        
    protected $table = 'books';

    protected $fillable = ['title','author','stock','category_id',
                'available_copies','lease_price_per_day',
                'image','description'];


}
