<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Shoe;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ApiController extends RoutingController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Shoe::all();
        return response()->json($data);
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
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'password' => 'required|min:6',
        ]);
        return User::create([
                    'fullname' => $request->input('fullname'),
                    'email' => $request->input('email'),
                    'phone_number' => $request->input('phone_number'),
                    'username' => $request->input('username'),
                    'password' => Hash::make($request->input('password')),
                    'id_role' => '2',
                ]);
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

    public function findCategory($category)
    {
        
        // return DB::table('shoes')->join('categories', 'shoes.id_category','=','categories.id_category')
        //                             ->where('categories.name_category','=',$category)->get();
    }

    public function findBrand($brand)
    {
        // return DB::table('shoes')->join('brands', 'shoes.id_brand','=','brands.id_brand')
        //                         ->where('brands.name_brand','=',$brand)->get();
    }

   
        }