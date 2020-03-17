    @extends('layouts.app')
@section('content')
    @isset($books)
        <div class="books-list">
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
        </div>
    @endisset
    @if(count($books) < 1)
        <div class="empty-books">
            no books avilable...
        </div>
    @endif
@endsection
