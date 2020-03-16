
@foreach ($comments as $comment)
    {{ $comment->ownner}}
    <br>
    {{ $comment->comment }}
    <br>
@endforeach