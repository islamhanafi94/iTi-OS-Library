@extends('layouts.app')
@section('content')
    <div class="search">
        <form action={{route("index")}} method="GET">
            <input type="text" placeholder="search" name="search">
            <input type="submit" value="search">
        </form>
    </div>
    <div class="orderby">
        <form action={{route("index")}} method="GET">
            <label>order by : </label>
            <input type="submit" name="latest" value="latest">
            <input type="submit" name="rate" value="rate">
        </form>
    </div>
    @isset($catagory)
        <div class="sidebar">
            <h1 class="sidebartitle">select by category</h1>
            <a href={{route("index",["catagory"=>"all"])}}><button>all categories</button></a>
            @foreach ($catagory as $item)
                <a href={{route("index",["catagory"=>$item->id])}}><button>{{$item->name}}</button></a>
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
    @if(count($books) < 1)
        <div class="empty-books">
            no books avilable...
        </div>
    @endif
@endsection
