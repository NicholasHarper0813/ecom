@extends('admin.layout.admin')

@section('content')
<div class="navbar">
        <a class="navbar-brand" href="#">Categories</a>
            <ul class="nav navbar-nav">
                @if(!empty($categories))
                    @forelse($categories as $category)
                        <li>
                            <a href="{{route('category.show', $category->id)}}">{{$category->name}}</a>
                        </li><br/>
                        @empty
                        <li>
                            No Data
                        </li>
                    @endforelse
                @endif
            </ul>

            <a class="btn btn-primary" data-toggle="modal" href="#modal-id">Add Category</a>
            <div class="modal fade" id="modal-id">
                <div class="modal-dialog">
                    <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name"><strong>Name:</strong></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Category Name" autocomplete="name" autofocus> 

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>   
                </div>
            </div> 
    </div>
    @if(!empty($services))
        <section>
            <h3>Services</h3>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Services</th>
                </tr>
            </thead>
            <tbody>
            @forelse($services as $service)
                <tr>
                    <td>{{$service->name}}</td>
                </tr>
                @empty
                <tr>
                    <td>No Data</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        </section>
    @endif
@endsection