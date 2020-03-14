<div class="modal fade" id="M-{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Get a Copy</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('lease.store') }}" class="needs-validation" >
                <h5>Book info:</h5>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <ul>
                        <li>Title : {{$book->title}}</li>
                        <li>Author : {{$book->author}}</li>
                        <li>category : {{$book->category->name}}</li>
                        </ul>
                    </div>
                    <div class="form-group col-md-6">
                        <ul>
                            <li>Cost/day : {{$book->lease_price_per_day}} L.E</li>
                            <li>available Copies : {{$book->available_copies}}</li>
                            <li>category : {{$book->category->name}}</li>
                            </ul>
                        </div>
                  </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="recipient-name" class="col-form-label ">Lease Days:</label>
                        <input type="days" min="1" max="30" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="recipient-name" class="col-form-label ">Total Cost:</label>
                        <input type="cost" min="0" disabled class="form-control" id="recipient-name">
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Lease</button>
            </form>
        </div>
      </div>
    </div>
  </div>
