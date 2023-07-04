<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shoe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('id_user', session('Login'))->first();
        $checkout = session()->get(key: 'checkout');
        return view('app.cart.checkout')
        ->with('data', $data)
        ->with('checkout', $checkout);
    }

    public function checkout(Request $request)
    {
        session()->forget( 'checkout');
        if (session()->get(key: 'check') == 0 || session()->get(key: 'check') == null) {
            return view('auth.login');
        }
        $cart = session()->get(key: 'cart');
        if (session()->get(key: 'checkout') == null) {
            $checkout = array();
            session()->put('checkout', $checkout);

        }else {
            $checkout = session()->get(key: 'checkout');
        }
        $check_cart = array();
        $check_cart = $request->input('check-cart');
        if($check_cart == null){
            return  redirect()->back();
        }else{
        foreach ($check_cart as $check_cart_id) {
            foreach ($cart as $id => $cart_item) {
                if ($check_cart_id == $id) {
                    $checkout[$id] = $cart_item;
                }
            }
        }
        session()->put('checkout', $checkout);
        return redirect('/checkout');
    }
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $checkout = session()->get(key:'checkout');
        $cart = session()->get(key:'cart');
        session()->forget('cart');

        $request->validate([
            'name_buyer' => 'required',
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'address' => 'required',
        ], [
            'phone_number.digits'=> '* Phone number must be 10 digits.',
        ]);

        $order = Order::create([
            'id_user'=> $request->input('id_user'),
            'name_buyer' => $request->input('fullname'),
            'phone_number'=> $request->input('phone_number'),
            'address'=>$request->input('address'),
            'note'=> $request->input('note'),
            'total'=> $request->input('total'),
            'payment'=> $request->input('payment'),
            'status'=> $request->input('status')
        ]);
        
        foreach ($checkout as $id => $item) {
            $cur_price = $item['price'] - $item['price'] * $item['discount_value'] * 0.01;
            OrderDetail::create([
                'id_order' => $order->id_order,
                'id_shoe' => $id,
                'quantity' => $item['quantity'],
                'cur_price' => $cur_price
            ]);
            $shoe = Shoe::find($id);
            $shoe['quantity_stock'] -= $item['quantity'];
            $shoe['quantity_sold'] += $item['quantity'];
            $shoe->save();
            foreach($cart as $id_cart_item => $cart_item){
                if($id_cart_item == $id){
                    unset($cart[$id_cart_item]);
                }
            }
        }
        session()->put('cart', $cart);
        toastr()->success('Success','Order created successfully!',['timeOut' => 2000]);

        return redirect('/cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
