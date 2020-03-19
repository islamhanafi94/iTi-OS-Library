@extends('layouts.app')

@section('content')
<div class="album py-5 bg-light">
    <div class="container">
        <div class="home">
            <div class="search">
                <form action={{route("home")}} method="GET">
                    <input type="text" placeholder="search" name="search">
                    <input type="submit" value="search">
                </form>
            </div>


            {{-- filter by category --}}
            @isset($catagory)
                <div class="sidebar">
                    <h1 class="sidebartitle">select by category</h1>
                    <a href={{route("home",["catagory"=>"all"])}}><button>all categories</button></a>
                    @foreach ($catagory as $item)
                        <a href={{route("home",["catagory"=>$item->id])}}><button>{{$item->name}}</button></a>
                    @endforeach
                </div>
            @endisset

            <div class="orderby">
                <form action={{route("home")}} method="GET">
                    <label>order by : </label>
                    <input type="submit" name="latest" value="latest">
                    <input type="submit" name="rate" value="rate">
                    <input type="hidden" name="sortdata" value={{$sortdata}}>
                    <input type="hidden" name="sortvalue" value={{$sortvalue}}>
                </form>
            </div>
        </div>
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


    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
