<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="row">
    <div class="col-md-4">
        <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="https://images.pexels.com/photos/159866/books-book-pages-read-literature-159866.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">{{$book->title}}</h4>
                <h6 class="card-title">by: {{$book->author}}</h6>
                <p class="card-text">{{$book->description}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Lease</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        
                    </div>
                    <small class="text-muted">9 mins</small>
                </div>
            </div>
        </div>
    </div>
</div>
