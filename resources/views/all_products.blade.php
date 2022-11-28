@extends('master')
@section('content')

<div class="custom-product">
    <div class="col-sm-12">
        <div class="trending-wrapper">
            <h3>Products</h3>
            <br>
            <br>
            @foreach($product as $item)
            <div class="row searched-item cart-list-divider">
                <div class="col-sm-3">
                    <a href="detail/{{$item->id}}">
                        <img class="trending-image" src="{{$item->gallery}}">
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="detail/{{$item->id}}">
                        <div class="">
                            <h4>{{$item->name}}</h4>
                            <h5 style="color: black;">{{$item->description}}</h5>
                            <h5 style="color: black;">Price: {{$item->price}}</h5>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection