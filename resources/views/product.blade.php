@extends('layouts.base')

@section('content')
    <div class="row">
        <h3>Product List</h3>
        <p style="color: forestgreen">{{Session::get('msg')}}</p>
    </div>
    <div class="row">
        <div class="col-md-3" style="background: #dddddd; margin: 2px">
            <div>
                <h3>Product 1</h3>
                <h4>Price: 400 BDT</h4>
                <form method="post" action={{Route("cart.add")}}>
                    {{csrf_field()}}
                    <input type="hidden" name="productId" value="1">
                    <input type="hidden" name="price" value="400">
                    <input type="hidden" name="name" value="Product 1">
                    <input type="hidden" name="qty" value="1">
                    <button type="submit" class="btn btn-success btn-block">Add to Cart</button>
                </form>
            </div>
        </div>
        <div class="col-md-3" style="background: #dddddd; margin: 2px">
            <div>
                <h3>Product 2</h3>
                <h4>Price: 450 BDT</h4>
                <form method="post" action={{Route("cart.add")}}>
                    {{csrf_field()}}
                    <input type="hidden" name="productId" value="2">
                    <input type="hidden" name="price" value="450">
                    <input type="hidden" name="name" value="Product 2">
                    <input type="hidden" name="qty" value="1">
                    <button type="submit" class="btn btn-success btn-block">Add to Cart</button>
                </form>
            </div>
        </div>
        <div class="col-md-3" style="background: #dddddd; margin: 2px">
            <div>
                <h3>Product 3</h3>
                <h4>Price: 300 BDT</h4>
                <form method="post" action={{Route("cart.add")}}>
                    {{csrf_field()}}
                    <input type="hidden" name="productId" value="3">
                    <input type="hidden" name="price" value="300">
                    <input type="hidden" name="name" value="Product 3">
                    <input type="hidden" name="qty" value="1">
                    <button type="submit" class="btn btn-success btn-block">Add to Cart</button>
                </form>
            </div>
        </div>
        <div class="col-md-3" style="background: #dddddd; margin: 2px">
            <div>
                <h3>Product 4</h3>
                <h4>Price: 350 BDT</h4>
                <form method="post" action={{Route("cart.add")}}>
                    {{csrf_field()}}
                    <input type="hidden" name="productId" value="4">
                    <input type="hidden" name="price" value="350">
                    <input type="hidden" name="name" value="Product 4">
                    <input type="hidden" name="qty" value="1">
                    <button type="submit" class="btn btn-success btn-block">Add to Cart</button>
                </form>
            </div>
        </div>
        <div class="col-md-3" style="background: #dddddd; margin: 2px">
            <div>
                <h3>Product 5</h3>
                <h4>Price: 200 BDT</h4>
                <form method="post" action={{Route("cart.add")}}>
                    {{csrf_field()}}
                    <input type="hidden" name="productId" value="5">
                    <input type="hidden" name="price" value="200">
                    <input type="hidden" name="name" value="Product 5">
                    <input type="hidden" name="qty" value="1">
                    <button type="submit" class="btn btn-success btn-block">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
@endsection