<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    function index()
    {
        $data = Product::all();
        return view('product',['product'=>$data]);
    }

    function details($id)
    {
        $data = Product::find($id);
        return view('detail',['product'=>$data]);

    }

    function all_details()
    {
        $data = Product::all();
        return view('all_products',['product'=>$data]);
    }
    
    function addTOCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            $cart = new Cart;
            $cart->user_id= $req->session()->get('user')['id'];
            $cart->product_id= $req->product_id;
            $cart->save();
            return redirect('/');

        }
        else{
            return redirect('/login');
        }
    }

    static function cartItem(){
        $userId = Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }

    function cartlist(Request $req)
    {
        if($req->session()->has('user'))
        {
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*', 'cart.id as cart_id')
        ->get();

        return view('cartlist',['products'=>$products]);
        }
        else{
            return redirect('/login');
        }
    }

    function removecart($id)
    {
        Cart::destroy($id);
        return redirect('/cartlist');
    }

    function ordernow(Request $req)
    {
        if($req->session()->has('user'))
        {
        $userId = Session::get('user')['id'];
        $total = $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->sum('products.price');

        return view('ordernow',['total'=>$total]);
        }else{
            return redirect('/login');
        }
    }

    function orderplace(Request $req)
    {
        $userId = Session::get('user')['id'];
        $allcart = Cart::where('user_id',$userId)->get();
        foreach($allcart as $cart)
        {
            $order = new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->status="pending";
            $order->payment_method=$req->payment;
            $order->payment_status="pending";
            $order->address=$req->address;
            $order->save();
            Cart::where('user_id',$userId)->delete();
        }
        $req->input();
        return redirect('/');
    }

    function myorders(Request $req)
    {
        if($req->session()->has('user'))
        {
        $userId = Session::get('user')['id'];
        $orders = DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$userId)
        ->get();

        return view('myorders',['orders'=>$orders]);
        }
        else{
            return redirect('/login');
        }
    }
}
