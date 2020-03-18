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
                @csrf
                <input type="hidden" name="id" value={{$book->id}}>

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
                            <input type="hidden" id="costPerDay" value={{$book->lease_price_per_day}}>
                            <li>available Copies : {{$book->available_copies}}</li>
                        </ul>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="days" class="col-form-label ">Lease Days:</label>
                        <input class="form-control" name="days" id="days" max="30" min="1" type="number" oninput="input()">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cost" class="col-form-label ">Total Cost:</label>
                        <span id="total"></span>
                        <input class="form-control" id="cost" name="cost" type="hidden" value=>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Lease</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
    function input() {
        total.innerHTML = costPerDay.value * days.value;
        cost.value = total.innerHTML;
    }
</script>

