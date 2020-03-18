<head>
    <link href="{{ asset('css/userRating.css') }}" rel="stylesheet">
</head>
{!! Form::open(['route' => 'rates.store']) !!}
    <div class="rating">
        <input type="hidden" name="bookId" value={{$book->id}}>
        <input type="radio" name="rating" id="rating-5" value="5" >
        <label for="rating-5"></label>
        <input type="radio" name="rating" id="rating-4" value="4">
        <label for="rating-4"></label>
        <input type="radio" name="rating" id="rating-3" value="3">
        <label for="rating-3"></label>
        <input type="radio" name="rating" id="rating-2" value="2">
        <label for="rating-2"></label>
        <input type="radio" name="rating" id="rating-1" value="1" required>
        <label for="rating-1"></label>
    </div>
    <button type="submit" class="rate btn">Rate</button>
{!! Form::close() !!}