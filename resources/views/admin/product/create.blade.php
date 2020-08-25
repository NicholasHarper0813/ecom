@extends('admin.layout.admin')

@section('content')
        <h3>Add Menu</h3>

        <div class="row">
        <div class="col-md-6 col-md-offset-3">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                        <label for="name"><strong>Name:</strong></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  autocomplete="name" autofocus> 

                        @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                </div>

                <div class="form-group">
                        <label for="description"><strong>Description:</strong></label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"  autocomplete="description"> 
                        
                        @error('description')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                </div>

                <div class="form-group">
                        <label for="price"><strong>Price:</strong></label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" autocomplete="price"> 
                        
                        @error('price')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                </div>

                <div class="form-group">
                        <label for="category_id"><strong>Category:</strong></label>
                        <select class="form-control" name="category_id" id="category_id">
                                <option disabled selected>Select Menu Category</option>
                                @foreach($categories as $category)
                                <option value="1">{{ $category }}</option>
                                @endforeach
                        </select> 
                </div> 

                <div class="form-group">
                        <label for="image"><strong>Image:</strong></label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" >
                        
                        @error('image')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                </div>

                <div class="form-group"> 
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>

        </div> 
        </div>

@endsection