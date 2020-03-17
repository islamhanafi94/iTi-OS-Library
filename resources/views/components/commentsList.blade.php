@if($comments == 'No Comments')

@else 
    <?php $index = 0 ; ?>

    @foreach ($comments as $comment)
        <strong>{{ $ownners[$index]['ownner'].':'}} </strong>
        {{ $comment['comment']}}
        {{ $comment['id'] }}
        @if (Auth::user()->id == $ownners[$index]['id'])
            {!! Form::open(['route' => ['comment.destroy', $comment['id']] , 'method'=>'delete']) !!}
            {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endif
        <br>
        <br>
        <?php $index++; ?>
    @endforeach

@endif