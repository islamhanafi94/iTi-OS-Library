<link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <div class="col-md-3">
        <div class="card mb-3 box-shadow">
        <img class="card-img-top" src='image/{{$book->image}}' style="height: 200px">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">{{$book->title}}</h5>
                    <small class="text-muted">
                        @component('components.rating',['rating'=>$book->rating])

                        @endcomponent
                    </small>

                </div>
                <h6 class="card-subtitle mb-2 text-muted">Author: <strong>{{$book->author}}</strong></h6>
                <h6 class="card-subtitle mb-2 text-muted">Category: <strong>{{$book->category->name}}</strong></h6>
                <div class="card-text">{{$book->description}}</div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        @if ($book->available_copies == 0)
                            <button type="button" disabled class="btn btn-sm btn-outline-secondary">unavaliable</button>
                        @elseif(property_exists(Auth::user()->leases, $book->id))
                            <button type="button" disabled class="btn btn-sm btn-outline-secondary">Leased</button>
                        @else
                            <button type="button" data-toggle="modal" data-target="#M-{{$book->id}}" class="btn btn-sm btn-outline-secondary">Lease</button>
                            @component('components.leaseModal', ['book'=>$book])

                            @endcomponent
                        @endif
                        {{-- Dalia: I made action on view btn redirct you to page name book.blade.php onclick="window.location='{{ route("books.show", array($book)) }}'"--}}
                        {!! Form::open(['route' => ['book.show', $book], 'method'=>'get']) !!}
                            <button type="submit" class="btn btn-sm btn-outline-secondary">View</button>
                        {!! Form::close() !!}
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Favorite</button>
                    <p>{{property_exists(Auth::user()->leases, $book->id)}}</p>
                </div>
            </div>
        </div>
    </div>
