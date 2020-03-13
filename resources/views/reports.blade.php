@extends('layouts.dashboard')

@section('title')
    Profits Graph
@endsection

@section('content')
    <div style="width: 70%">
        {!! $Chart->container() !!}
    </div>

    {!! $Chart->script() !!}

@endsection