@extends('layouts.base')

@section('content')
    <div class="row">
        <h3>
            My Cart
        </h3>
    </div>

    <div class="row">
        <p style="color: forestgreen">{{Session::get('msg')}}</p>
        <p style="color: red">{{Session::get('remove_msg')}}</p>
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
                    <div class="row">
                        <div class="col-md-4">
                            <form method="post" action="{{Route('cart.update')}}">
                                {{csrf_field()}}
                                <input type="hidden" value="{{$cartProduct->rowId}}" name="rowId">
                                <input type="number" value="{{$cartProduct->qty}}" min="1" name="qty" style="width: 50px">
                                <button class="btn-success" type="submit">Update</button>
                            </form>
                        </div>
                        <div class="col-md-1">
                            <form method="post" action="{{Route('cart.remove')}}">
                                {{csrf_field()}}
                                <input type="hidden" value="{{$cartProduct->rowId}}" name="rowId">
                                <button class="btn-danger" type="submit">Remove</button>
                            </form>
                        </div>


                    </div>
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