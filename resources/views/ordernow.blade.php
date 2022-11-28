@extends('master')
@section('content')

<div class="custom-product">
    <div class="col-sm-6">
        <br>
        <h3>Order Details</h3>
        <br>
        <table class="table">
            <br>
            <thead>
                <th>Name</th>
                <th>Amount</th>
            </thead>
            <tr>
                <td>Amount</td>
                <td>$ {{$total}}</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td>$ 0</td>
            </tr>
            <tr>
                <td>Delivery</td>
                <td>$ 10</td>
            </tr>
            <tr>
                <td><b> TOTAL AMOUNT</b></td>
                <td><b> $ {{$total +10}} </b></td>
            </tr>
        </table>
    </div>
    <div class="seperator"></div>
    <div class="col-sm-6">
        <br>
        <h3>Customer Details</h3>
        <br>
        <div>
            <form action="/orderplace" method="POST">
                @csrf
                
                Address: <textarea name="address" placeholder="Enter Your Address" class="form-control"></textarea>
                <br>
                <div class="form-group">
                    <label for="pwd">Payment Method</label> <br><br>
                    <input type="radio" value="online" name="payment"><span>  Online Payment</span><br>
                    <input type="radio" value="cash" name="payment"><span>  Cash</span><br>
                </div>
                <button class="btn btn-default">Confirm Order</button>
            </form>
        </div>
    </div>
</div>

@endsection