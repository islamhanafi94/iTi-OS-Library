<link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <div class="col-md-3">
        <div class="card mb-3 box-shadow">
        <img class="card-img-top" src='image/{{$book->image}}' style="height: 200px">
            <div class="card-body">
                <div class="d-flex justify-content-end align-items-center">
                    {{-- <small class="text-muted"> --}}
                        @component('components.rating',['rating'=>$book->rating])

                        @endcomponent

                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">{{$book->title}}</h5>
                    {{-- <small class="text-muted">
                        @component('components.rating',['rating'=>$book->rating])

                        @endcomponent --}}
                    {{-- </small> --}}
                </div>
                <h6 class="card-subtitle mb-2 text-muted">Author: <strong>{{$book->author}}</strong></h6>
                <h6 class="card-subtitle mb-2 text-muted">Category: <strong>{{$book->category->name}}</strong></h6>
                <div class="card-text">
                    @if (strlen($book->description)<=100)
                        {{$book->description}}
                        <br>
                    @endif
                    {{substr($book->description,0,100)."... "}}<a href="{{ url('/home') }}">see more</a>
                    <br><br>

                </div>
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
                    {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Favorite</button> --}}
                    @if (\Request::is('home'))
                    <div>
                        @if (gettype($favorites->search($favorites->find($book->id))) != "boolean")
                        <form action={{route("favorites.destroy",[$book->id])}} method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fa fa-heart" aria-hidden="true"></i>
                            </button>

                            {{-- <input type="submit" value="delete from favorites" class="btn btn-sm btn-outline-secondary"> --}}
                            {{-- <input type="hidden" name="user_id" value={{Auth::id()}}> --}}
                            <input type="hidden" name="book_id" value={{$book->id}}>
                            <input type="hidden" name="source" value="home">
                        </form>
                        @else
                        <form action={{route("favorites.store",["book_id"=>$book->id])}} method="POST">
                            @csrf
                            {{-- <input type="submit" value="add to favorites" class="btn btn-sm btn-outline-secondary"> --}}

                            <button type="submit"><i class="fa fa-heart-o" aria-hidden="true"></i>
                            </button>
                            <input type="hidden" name="source" value="home">
                        </form>
                        @endif
                    </div>
                    @else
                    <form action={{route("favorites.destroy",[$book->id])}} method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="fa fa-heart" aria-hidden="true"></i>
                        </button>
                    <input type="hidden" name="user_id" value={{$book->pivot->user_id}}>
                        <input type="hidden" name="book_id" value={{$book->pivot->book_id}}>
                    </form>
        
                    @endif
                </div>
                <p>{{property_exists(Auth::user()->leases, $book->id)}}</p>
            </div>
        </div>
    </div>
