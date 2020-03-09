@extends('layouts.dashboard')

@section('title')
    category Control Panel
@endsection

@section('control-panel')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add New Category</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adding New Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('category.store') }}">
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="title">Category Name</label>
                        <input type="text" class="form-control" name='name' id="name">
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                </form>    
                    </div>
            
        </div>
    </div>
</div>

@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <ul>
    @foreach( $categories as $category)
    <li>
        <div class="form-group row mb-0 col-md-8">
                <h5 class="mb-0 col-md-8 row"> {{ $category->name}} </h5>
            <div class="offset-md-7 btn-toolbar row w-100">
                <div class="btn-group mr-7 col-sm w-100">
                {!! Form::open(['route' => ['category.edit', $category->id] , 'method'=>'get']) !!}
                {!! Form::submit('Update',['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
                </div>
                <div class="btn-group mr-7 col-sm w-100"> 
                {!! Form::open(['route' => ['category.destroy', $category->id] , 'method'=>'delete']) !!}
                {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </li>
    <br>
    @endforeach
    </ul>
    
@endsection