
{{$book->title}}
<br>
{{$book->description}}
<br>

@component('components.comment',["book" => $book])
@endcomponent

{{-- , "ownners" => $ownners --}}

@component('components.commentsList',["comments" => $comments ])
@endcomponent
