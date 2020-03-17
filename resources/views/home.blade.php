@extends('layouts.app')

@section('content')
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <?php 
               $index = 0; 
            ?>
    @forelse ($booksList as $book)
        @component('components.bookCard',["book"=>$book, 'index' => $index])
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
