
{{$book->title}}
<br>
{{$book->description}}
<br>

@component('components.comment',["book" => $book])
@endcomponent

@component('components.commentsList',["comments" => $comments])
@endcomponent
