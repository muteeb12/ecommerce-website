@extends('master')
@section('content')

<div class="custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h3>Results for Products</h3>
            <br>
            <a href="ordernow" class="btn btn-success">Order Now</a>
            <br>
            <br>
            @foreach($products as $item)
            <div class="row searched-item cart-list-divider">
                <div class="col-sm-3">
                    <a href="detail/{{$item->id}}">
                        <img class="trending-image"src="{{$item->gallery}}" >
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="detail/{{$item->id}}">
                        <div class="">
                            <h4>{{$item->name}}</h4>
                            <h5 style="color: black;">{{$item->description}}</h5>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove from cart</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection