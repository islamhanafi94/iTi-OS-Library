<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
{{-- <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span> --}}
@for ($i = 0; $i < 5; $i++)
    @if ($i < $rating)
        <span class="fa fa-star checked"></span>
    @else
        <span class="fa fa-star"></span>
    @endif
    
@endfor

<style>
    .checked{
      color: orange;
    }

</style>

