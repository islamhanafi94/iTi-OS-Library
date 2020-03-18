@extends('layouts.app')
@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">

                <?php
                    $index = 0;
                ?>

                @forelse ($leases as $lease)
                    @component('components.bookCard', ['book' => $lease, 'index' => $index])
                    @endcomponent
                        <?php
                            $index++;
                        ?>
                @empty
                    <h1>No Books</h1>
                @endforelse
            </div>
        </div>
    </div>
@endsection
