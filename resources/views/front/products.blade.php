@extends('layout.main')

@section('title','Menu')
@section('content')
<div class="subheader text-center">
        <h2>
             Hackathon's Kitchen Menu
        </h2>
        </div>
       
        <!-- Latest Menus -->
        <div class="row">
            @forelse($products->chunk(4) as $chunk)
                @foreach($chunk as $product) 
                <div class="small-3 columns">
                    <div class="item-wrapper">
                        <div class="img-wrapper">
                            <a href="{{route('cart.addItem', $product->id)}}" class="button expanded add-to-cart">
                                Add to Cart
                            </a>
                            <a href="#">
                                <img src="{{url('images',$product->image)}}"/>
                            </a>
                        </div>
                            <h3>
                                {{$product->name}}
                            </h3>
                        <h5>
                                R{{$product->price}}
                        </h5>
                        <p>
                                {{$product->description}}
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