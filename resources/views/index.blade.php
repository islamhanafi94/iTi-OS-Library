@extends('layouts.lib')

@section('content')
    @isset($catagory)
    <form action="{{route('index')}}" class="filter-form">
        @csrf
        <select name="catagory">
            <option value="all">all catagories</option>
            @foreach ($catagory as $item)
                <option value={{$item->id}}>{{$item->name}}</option>
            @endforeach
        </select>
        <input type="submit" value="filter by catagory" class="filter">
    </form>
    @endisset

    @isset($books)
        <div class="books-list">
            @foreach ($books as $book)
                <div class="books-card">
                    <div class="book-header">{{$book->title}}</div>
                    <div class="book-body">{{$book->description}}</div>
                    <div class="book-footer">{{$book->lease_price}}$</div>
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
