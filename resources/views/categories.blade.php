@extends('layouts.dashboard')

@section('title')
    Category Control Panel
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
    @isset($categories)
    <table class="table table-striped h5">
    <thead>
        <tr>
            <th scope="col">Category Name</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $categories as $category)
        <tr>
            <td>{{ $category->name}} </td>
            <td>
                <div class="btn-toolbar">
                    <button class="btn btn-primary btn-group mr-4" data-toggle="modal"
                        data-target="#update-user-modal-{{ $category->id }}">Update</button>
                    <div class="modal fade update-user-modal" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true" id="update-user-modal-{{ $category->id }}">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-username">Update Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('category.update',$category)}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group col-md-6">
                                            <label for="name">Category Name</label>
                                            <input type="text" required class="form-control" name='name'
                                                id="name" value="{{$category->name}}">
                                        </div>
                                        <br>
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <form action="{{route('category.destroy',$category)}}" method="POST" style="display:inline-block">
                        <input type="submit" value="Delete" class="btn btn-danger btn-group">
                        @csrf
                        @method('DELETE')
                    </form>
                    </div>    
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endisset
    
@endsection