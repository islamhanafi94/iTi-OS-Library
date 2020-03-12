@extends('layouts.app')
@section('content')
    @isset($catagory)
        <div class="sidebar">
            <h1 class="sidebartitle">select by category</h1>
            <button><a href={{route("index",["catagory"=>"all"])}}>all categories</a></button>
            @foreach ($catagory as $item)
                <button><a href={{route("index",["catagory"=>$item->id])}}>{{$item->name}}</a></button>
            @endforeach
        </div>
    @endisset
    @isset($books)
        <div class="books-list">
            @foreach ($books as $book)
                <div class="books-card">
                    <div class="book-header">{{$book->title}}</div>
                    <div class="book-body">{{$book->description}}</div>
                    <div class="book-footer">{{$book->lease_price_per_day}}$</div>
                </div>
             @endforeach    
        </div>      
    @endisset
    @empty($books)
     <div class="empty-books">
         no books avilable...
     </div>
    @endempty
@endsection
