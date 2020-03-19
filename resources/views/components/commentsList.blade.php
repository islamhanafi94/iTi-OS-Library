
@foreach ($comments as $comment)
<div class="d-flex  justify-content-between align-items-top">
    <div class=" d-flex  justify-content-between align-items-top">    
        <h3>{{$comment->username.": "}} </h3>
        <div class="lead">{{$comment->pivot->comment}}</div>
    </div>
    <div>
        @if (Auth::user()->id == $comment->pivot->user_id)
        {!! Form::open(['route' => ['comment.destroy', $comment->pivot->id] , 'method'=>'delete']) !!}
        {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    @endif
    </div>

</div>    
<hr>
@endforeach