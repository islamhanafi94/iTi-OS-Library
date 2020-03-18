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
