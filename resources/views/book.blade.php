@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex  align-items-top">
        <img src="http://localhost:8000/image/{{$book->image}}" style="height: 300px" alt="...">
        <ul class="list-group list-group-flush">
            <li class="list-group-item h4">Title : {{$book->title}}</li>
            <li class="list-group-item h4">Author : {{$book->author}}</li>
            <li class="list-group-item h4">Category : {{$book->category->name}}</li>
            <li class="list-group-item h4">Rating : 
                @component('components.rating',['rating'=>$book->rating])
                @endcomponent
            </li>
            <li class="list-group-item h4">Your Rate :
                @if(Auth::user()->rate()->where('book_id', $book->id)->exists())
                    @component('components.rating',['rating' => $rate->pivot->rating])
                    @endcomponent
                @else
                    @component('components.userRating',["book" => $book])
                    @endcomponent
                @endif    
             </li>
        </ul>
            
    </div>
    <br>
    <p class="text-md-left h5">{{$book->description}}</p>
    <hr>
    @component('components.comment',["book" => $book])
    @endcomponent
    @component('components.commentsList',["comments" => $comments ])
    @endcomponent
</div>
@endsection