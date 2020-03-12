@extends('layouts.dashboard')

@section('content')
<h1>Sales Graphs</h1>

<div style="width: 60%">
    {!! $Chart->container() !!}
</div>
{!! $Chart->script() !!}
@endsection