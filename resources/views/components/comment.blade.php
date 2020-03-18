
<head>
    <link href="{{ asset('css/comment.css') }}" rel="stylesheet">
{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css"> --}}
</head>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="widget-area no-padding blank">
                <div class="status-upload">
                    {!! Form::open(['route' => 'comment.store']) !!}
                    <form action="{{ route('comment.store') }}">
                        @csrf
                        <input type="hidden" name="bookId" value={{$book->id}}>
                        <textarea name='comment' placeholder="What is your opnion about this book?" ></textarea>
                        <button type="submit" class="btn btn-success">Share</button>
                    </form>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>  
    </div>
</div>