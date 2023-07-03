<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Role;
use App\Models\Shoe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function checkLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required | min:5',
        ]);

        $loginEmail = User::where('email', $request->username)->first();
        $loginUsername = User::where('username', $request->username)->first();

        if (!$loginEmail) {

            if (!$loginUsername) {
                return back()->with('Fail', '* Email or Username does not exist!');
            } else {
                if (Hash::check($request->password, $loginUsername->password)) {
                    $request->session()->put('Login', $loginUsername->id_user);

                    $data = User::where('id_user', session('Login'))->first();
                    $brands = Brand::all();
                    $categories = Category::all();
                    $shoes = Shoe::all();
                    $users = User::all();
                    $roles = Role::all();
                    $discounts = Discount::all();
                    $bestsellers = DB::table('shoes')->orderBy('quantity_sold', 'desc')->get();
                    $newshoes = DB::table('shoes')->orderBy('created_at', 'desc')->get();

                    if ($loginUsername->id_role == '1') {
                    } else {
                        session()->put('check', '2');
                        return view('index')->with('data', User::where('id_user', session('Login'))->first())->with('route', 'home')
                            ->with('brands', $brands)
                            ->with('categories', $categories)
                            ->with('shoes', $shoes)
                            ->with('users', $users)
                            ->with('discounts', $discounts)
                            ->with('roles', $roles)
                            ->with('newshoes', $newshoes)
                            ->with('bestsellers', $bestsellers);
                    }
                } else {
                    session()->put('check', '0');
                    return back()->with('Fail', '* Wrong password');
                }
            }
        } else {
            if (Hash::check($request->password, $loginEmail->password)) {
                $request->session()->put('Login', $loginEmail->id_user);

                $data = User::where('id_user', session('Login'))->first();
                $brands = Brand::all();
                $categories = Category::all();
                $shoes = Shoe::all();
                $users = User::all();
                $roles = Role::all();
                $discounts = Discount::all();
                $bestsellers = DB::table('shoes')->orderBy('quantity_sold', 'desc')->get();
                $newshoes = DB::table('shoes')->orderBy('created_at', 'desc')->get();

                if ($loginEmail->id_role == '1') {
                } else {

                    session()->put('check', '2');
                    return view('index')->with('data', $data)->with('route', 'home')
                        ->with('brands', $brands)
                        ->with('categories', $categories)
                        ->with('shoes', $shoes)
                        ->with('users', $users)
                        ->with('discounts', $discounts)
                        ->with('roles', $roles)
                        ->with('newshoes', $newshoes)
                        ->with('bestsellers', $bestsellers);
                }
            } else {
                session()->put('check', '0');
                return back()->with('Fail', '* Wrong password');
            }
        }
    }

    function logout()
    {
        if (session()->has('Login')) {
            session()->pull('Login');
            session()->put('check', '0');
            return redirect('/home');
        }
        session()->put('check', '0');
        return redirect('/home');
    }

    // Register;
    public function register()
    {
        return view('auth.register');
    }
    public function saveRegister(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required | email | unique:users',
            'phone_number' => 'required',
            'username' => 'required | unique:users',
            'password' => 'required | min:6 | confirmed',
            'id_role' => 'required',
        ], [
            'email.unique' => '* Email already exists.',
            'username.unique' => '* Username already exists.',
            'password.min' => '* Password must contain at least 6 characters.',
            'password.confirmed' => '* The confirmation password entered is incorrect.',
        ]);

        User::create([
            'fullname' => $request->input('fullname'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'id_role' => '2'
        ]);
        return redirect()->back()->with('Success', 'Account successfully created.');
    }
}
