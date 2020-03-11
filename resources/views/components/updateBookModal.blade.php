<div class="modal fade updateBook-{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adding New Book</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('books.update',$book)}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="title">Book Title</label>
                        <input type="text" class="form-control" name='title'  value={{$book->title}} id="title">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="author">Author</label>
                        <input type="text" class="form-control"  value={{$book->author}} name='author' id="author">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="category">Category</label>
                        <select id="category" class="form-control" name='category'>
                          <option selected >{{$book->category->name}}</option>
                          @forelse ($allCategories as $category)
                            @if ($book->category->name != $category->name )
                                <option>{{$category->name}}</option>
                            @endif
                          @empty
                              <option> No Categories</option>
                          @endforelse
                        </select>
                      </div>
                      
                      <div class="form-group col-md-3">
                        <label for="lease-price">Lease Price/Day</label>
                        <input type="number" value={{$book->lease_price_per_day}} class="form-control" min="1" step="0.25" id="lease-price" name='lease_price_per_day'>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="copies">Available Copies</label>
                        <input type="number" class="form-control" value={{$book->available_copies}} id="available_copies" name='available_copies' min="1">
                      </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control"  style="resize:none" name="description" id="description" rows="3">{{$book->description}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="image">Book Image</label>
                        <input type="file" class="form-control-file" name="image" id="image">
                      </div>
                      
                    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
            </div>
          </div>
          </div>
    </div>
