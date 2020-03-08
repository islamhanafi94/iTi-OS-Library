@extends('layouts.dashboard')

@section('title')
    Books Control Panel
@endsection

@section('control-panel')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add New Book</button>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adding New Book</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('books.store') }}">
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="title">Book Title</label>
                        <input type="text" class="form-control" name='title' id="title">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" name='author' id="author">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="category">Category</label>
                        <select id="category" class="form-control" name='category'>
                          <option selected disabled>Choose...</option>
                          <option>Fiction</option>
                          {{-- TO-DO --}}
                        </select>
                      </div>
                      
                      <div class="form-group col-md-3">
                        <label for="lease-price">Lease Price/Day</label>
                        <input type="number" class="form-control" min="1" step="0.25" id="lease-price" name='lease_price_per_day'>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="copies">Available Copies</label>
                        <input type="number" class="form-control" id="available_copies" name='available_copies' min="1">
                      </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" style="resize:none" name="description" id="description" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="image">Book Image</label>
                        <input type="file" class="form-control-file" name="image" id="image">
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