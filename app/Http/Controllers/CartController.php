<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Shoe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CartController extends Controller
{
    public function index()
    {
        $data = User::where('id_user', session('Login'))->first();
        $shoes = Shoe::all();
        $discounts = Discount::all();

        if (session()->get(key: 'cart') == null) {
            $cart = array();
            session()->put('cart', $cart);
        }else {
            $cart = session()->get(key: 'cart');
        }
        $lenCart = count($cart);

        return view('index')->with('route', 'cart')
            ->with('lenCart', $lenCart)
            ->with('data', $data)
            ->with('shoes', $shoes)
            ->with('discounts', $discounts)
            ->with('cart', $cart);
    }

    public function addToCart($id)
    {
        $discounts = Discount::all();
        $shoe = Shoe::find($id);
        $cart = session()->get(key: 'cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {

            $cart[$id] = [
                'id_shoe' => $id,
                'name_shoe' => $shoe['name_shoe'],
                'image_1' => $shoe['image_1'],
                'price' => $shoe['price'],
                'quantity' => 1,
            ];

            foreach ($discounts as $discount) {
                if ($discount['id_discount'] == $shoe['id_discount']) {
                    $cart[$id]['discount_value'] = $discount['discount_value'];
                }
            }
        }

        session()->put('cart', $cart);
        toastr()->success('Success','This product has been added to your cart!',['timeOut' => 2000]);

        return Redirect('/shop/product=' . $id);
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
        //


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {
        $cart = session()->get(key: 'cart');
        $cart[$request->id]['quantity'] =  $request->quantity;

        session()->put('cart', $cart);
        toastr()->success('Success','This product has been updated!',['timeOut' => 2000]);
        return Redirect('/cart');
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
        $cart = session()->get(key: 'cart');

        unset($cart[$id]);
        session()->put('cart', $cart);
        toastr()->warning('Success','This product has been remove!',['timeOut' => 2000]);
        return Redirect('/cart');
    }
}
