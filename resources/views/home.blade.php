@extends('layouts.app')

@section('content')
<nav class="navbar navbar-light bg-light justify-content-between">
    <form action={{route("home")}} method="GET">
        <a class="navbar-brand">Order By : </a>
        {{-- <label >order by : </label> --}}
        <input class="btn btn-info btn-lg" type="submit" name="latest" value="latest">
        <input class="btn btn-info btn-lg" type="submit" name="rate" value="rate">
        <input type="hidden" name="sortdata" value={{$sortdata}}>
        <input type="hidden" name="sortvalue" value={{$sortvalue}}>
    </form>

    <form class="form-inline" action={{route("home")}} method="GET">
        <input class="form-control mr-sm-2" type="text" placeholder="search" name="search">
        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="search">
    </form>
</nav>
    
    
<div class="d-flex album py-5 bg-light">
    <div id="myList" class="list-group">
        @isset($catagory)
        <a class="list-group-item list-group-item-action active" href={{route("home",["catagory"=>"all"])}}>All Categories</a>
        @foreach ($catagory as $item)
        <a class="list-group-item list-group-item-action" href={{route("home",["catagory"=>$item->id])}}>{{$item->name}}</a>
        @endforeach
        @endisset

      </div>
    <div class="container">
        
        <div class="row">

            <?php
                $index = 0;
            ?>

            @forelse ($booksList as $book)
                @component('components.bookCard',["book"=>$book, 'index'=>$index, "favorites" => $favorites])
                @endcomponent
                <?php
                    $index++
                ?>
            @empty
                <h1>No Books</h1>
            @endforelse
        </div>
    </div>
</div>
@endsection

