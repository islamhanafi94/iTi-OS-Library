
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
                        <button type="submit" class="btn btn-success"><i class="fas fa-share"></i>Share</button>
                    </form>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>  
    </div>
</div>