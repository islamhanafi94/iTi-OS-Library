@if($comments == 'No Comments')

@else 
    <?php $index = 0 ; ?>

    @foreach ($comments as $comment)
        <strong>{{ $ownners[$index++].':'}} </strong>
        {{ $comment}}
        @if (Auth::user()->can('delete', $comment))
            <!-- The Current User Can Update The Post -->
            <button type="submit">Delete</button>
        @endif
        <br>
        <br>
    @endforeach

@endif