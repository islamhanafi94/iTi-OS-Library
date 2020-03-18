<head>
    <link href="{{ asset('css/userRating.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/comment.css') }}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
    
</head>
{{$book->title}}
<br>
{{$book->description}}
<br>
<?php $isRating = 0; ?>

@component('components.userRating',["book" => $book, 'isRating' => $isRating])
@endcomponent

@component('components.comment',["book" => $book])
@endcomponent

@component('components.commentsList',["comments" => $comments ])
@endcomponent
