@extends('layouts.base')

@section('content')
    <div class="row">
        <h2>
            My Cart
        </h2>
    </div>

    <div class="row">
        <h3>Shopping Cart</h3>
        <p style="color: forestgreen">{{Session::get('msg')}}</p>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Sub Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cartProducts as $cartProduct)
            <tr>
                <td>{{$cartProduct->id}}</td>
                <td>{{$cartProduct->name}}</td>
                <td>
                    <form method="post" action="{{Route('cart.update')}}">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$cartProduct->rowId}}" name="rowId">
                        <input type="number" value="{{$cartProduct->qty}}" min="1" name="qty">
                        <button class="btn-success" type="submit">Update</button>
                    </form>
                </td>
                <td>{{$cartProduct->price}} BDT</td>
                <td>{{$cartProduct->price * $cartProduct->qty}} BDT</td>
                <?php $total = $total + ($cartProduct->price * $cartProduct->qty)?>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total Price</td>
                <td>{{$total}} BDT</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection