@extends('layouts.app')
@section('content')
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">

    @forelse ($books as $book)
        @component('components.bookCard',["book"=>$book,"favorites" => $fav])
        @endcomponent
    @empty
        <h1>No Books</h1>
    @endforelse
        </div>
    </div>
</div>
@endsection

    {{-- @isset($books)
    @foreach ($books as $book)
        <div class="books-card">
            <div class="book-header">{{$book->title}}</div>
            <div class="book-body">{{$book->description}}</div>
            <div class="book-footer">{{$book->lease_price_per_day}}$</div>
            <form action={{route("favorites.destroy",[$book->id])}} method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="delete from favorites">
                <input type="hidden" name="user_id" value={{$book->pivot->user_id}}>
                <input type="hidden" name="book_id" value={{$book->pivot->book_id}}>
            </form>
        </div>
    @endforeach    
    @endisset
    @if(count($books) < 1)
    <div class="empty-books">
    no books avilable...
    </div>
    @endif --}}
