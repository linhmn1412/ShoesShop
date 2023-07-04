<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;

class ApiOrderController extends RoutingController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $request->validate([
            'name_buyer' => 'required',
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'address' => 'required',
            'checkout.*.quantity' => 'required|integer|min:1',
            'checkout.*.price' => 'required|numeric|min:0',
        ]);
        
        $order = Order::create([
            'id_user'=> 2,
            'name_buyer' => $request->input('name_buyer'),
            'phone_number'=> $request->input('phone_number'),
            'address'=>$request->input('address'),
            'note'=> $request->input('note'),
            'total'=> $request->input('total'),
            'payment'=> $request->input('payment'),
            'status'=> 'unconfirmed'
        ]);

        foreach ($request->input('checkout') as $item) {
            $cur_price = $item['price'] - $item['price'] * $item['discount_value'] * 0.01;
            OrderDetail::create([
                'id_order' => $order->id_order,
                'id_shoe' => $item['id_shoe'],
                'quantity' => $item['quantity'],
                'cur_price' => $cur_price
            ]);
        }

        return response()->json(['message' => 'Order created successly'], 201);
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
