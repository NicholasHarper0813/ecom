@extends('admin.layout.admin')

@section('content')
    <h3>Menus</h3>

     <ul>
        @forelse($products as $product)
        <li>
            <h4>Name of Product:{{$product->name}}</h4>
            <h4>Category:{{count(array($product->category))?$product->category->name:"N/A"}}</h4>
            <form action="{{route('product.destroy', $product->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <input type="submit" class="btn btn-sm btn-danger" value="Delete">  
            </form>
        </li> 
        
        @empty
        <h3>No Menus</h3>

        @endforelse  
     </ul>
@endsection