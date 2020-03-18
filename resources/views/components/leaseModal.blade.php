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
                            <input type="hidden" class="costPerDay" value={{$book->lease_price_per_day}}>
                            <li>Available Copies : {{$book->available_copies}}</li>
                        </ul>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="days" class="col-form-label ">Lease Days:</label>
                        <input class="form-control days" name="days" max="30" min="1" type="number" required oninput="input({{$index}})">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cost" class="col-form-label ">Total Cost:</label>
{{--                        <span class="total"></span>--}}
                        <input class="form-control total" name="cost" type="number" readonly>
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
    function input(id) {
        console.log(id);
        document.getElementsByClassName('total')[id].value= document.getElementsByClassName('costPerDay')[id].value * document.getElementsByClassName('days')[id].value;
        // total.innerHTML = costPerDay.value * days.value;
        // document.getElementsByClassName('cost')[id].value = document.getElementsByClassName('total')[id].innerHTML;
    }
</script>

