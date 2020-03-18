
@foreach ($comments as $comment)
<strong>{{ $comment->username.':'}} </strong>
    {{ $comment->pivot->comment}}
    {{ 'book'.$comment->pivot->book_id}}
    {{ 'Cid'.$comment->pivot->id}}
    @if (Auth::user()->id == $comment->pivot->user_id)
        {!! Form::open(['route' => ['comment.destroy', $comment->pivot->id] , 'method'=>'delete']) !!}
        {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    @endif
    <br>
    <br>
@endforeach