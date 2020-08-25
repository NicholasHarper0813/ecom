@extends('layout.main')

@section('title','Cart')
@section('content')
<div class="row">
    <h3>Cart Items</h3>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>qty</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cartItems as $cartItem)
            <tr>
                <td>{{$cartItem->name}}</td>
                <td>{{$cartItem->price}}</td>
                <td width="55px">
                {!! Form::open(['route' => ['cart.update',$cartItem->rowId],'method' => 'PUT']) !!}
                    <input type="text" name="qty" value="{{$cartItem->qty}}">
                    
                </td>
                <td>
                    <input style="float: left" type="submit" class="button success small" value="OK">
                    {!! Form::close() !!}

                    <form action="{{route('cart.destroy', $cartItem->rowId)}}" method="post"> 
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input type="submit" class="alert button small" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
        <tr>
            <td>Tax: R{{Cart::tax()}}<br>Sub Total: R{{Cart::subtotal()}}<br>Grand Total: R{{Cart::total()}}<br>Items: {{Cart::count()}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>

    <a href="{{route('checkout.shipping')}}" class="button">Checkout</a> 
</div>

@endsection