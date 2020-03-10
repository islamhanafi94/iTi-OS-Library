@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    <div>   
                        {!! Form::open(['route' => ['category.update', $category] , 'method'=>'put']) !!}
                            <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('category') }}</label>
                            <div class="col-md-6">
                            {!! Form::text('name', $category->name, ['class' => 'orm-control']) !!}
                            </div>
                            </div>
                            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            {!! Form::submit('Update',['class' => 'btn btn-primary']) !!}
                            </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>