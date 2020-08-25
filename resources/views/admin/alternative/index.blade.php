@extends('admin.layout.admin')

@section('content')
    <h3>Menus</h3>

     <ul>
        @forelse($alternatives as $alternative)
        <li>
            <h4>Name of Product:{{$alternative->name}}</h4>
            <h4>Category:{{count(array($alternative->category))?$alternative->category->name:"N/A"}}</h4>
            <form action="{{route('alternative.destroy', $alternative->id)}}" method="post">
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