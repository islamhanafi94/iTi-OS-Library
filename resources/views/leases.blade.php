@extends('layouts.app')
@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">

                @forelse ($leases as $lease)
                    @component('components.bookCard', ['book' => $lease])
                    @endcomponent
                @empty
                    <h1>No Books</h1>
                @endforelse
            </div>
        </div>
    </div>
@endsection
