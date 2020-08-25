@extends('layout.main')

@section('title','Alternative Menu')
@section('content')
<div class="subheader text-center">
        <h2>
             Hackathon's Kitchen Alternative Menu
        </h2>
        </div>
       
        <!-- Latest Menus -->
        <div class="row">
            @forelse($alternatives->chunk(4) as $chunk)
                @foreach($chunk as $alternative) 
                <div class="small-3 columns">
                    <div class="item-wrapper">
                        <div class="img-wrapper">
                            <a href="{{route('cart.addAlternativeItem', $alternative->id)}}" class="button expanded add-to-cart">
                                Add to Cart
                            </a>
                            <a href="#">
                                <img src="{{url('images',$alternative->image)}}"/>
                            </a>
                        </div>
                            <h3>
                                {{$alternative->name}}
                            </h3>
                        <h5>
                                R{{$alternative->price}}
                        </h5>
                        <p>
                                {{$alternative->description}}
                        </p>
                    </div>
                </div>
                @endforeach
            @empty
                <h4>No Menus</h4>
            @endforelse
        </div>
        <!-- Footer -->
        <br> 
        <br/>
        <!-- Footer -->
        <br>
@endsection