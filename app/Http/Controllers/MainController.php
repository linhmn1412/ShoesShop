<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Feedback;
use App\Models\Role;
use App\Models\Shoe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{

    public function index()
    {
        $data = User::where('id_user', session('Login'))->first();
        $brands = Brand::all();
        $categories = Category::all();
        $shoes = Shoe::all();
        $discounts = Discount::all();
        $bestsellers = DB::table('shoes')->orderBy('quantity_sold', 'desc')->get();
        $newshoes = DB::table('shoes')->orderBy('created_at', 'desc')->get();

        return view('index')->with('route', 'home')
            ->with('data', $data)
            ->with('brands', $brands)
            ->with('categories', $categories)
            ->with('shoes', $shoes)
            ->with('discounts', $discounts)
            ->with('newshoes', $newshoes)
            ->with('bestsellers', $bestsellers);
    }


    public function shop()
    {
        $data = User::where('id_user', session('Login'))->first();
        $brands = Brand::all();
        $categories = Category::all();
        $discounts = Discount::all();
        $shoes = Shoe::paginate(9);

        return view('index')->with('route', 'shop')
            ->with('data', $data)
            ->with('brands', $brands)
            ->with('categories', $categories)
            ->with('shoes', $shoes)
            ->with('discounts', $discounts);
    }

    public function findCategory($category)
    {
        $data = User::where('id_user', session('Login'))->first();
        $brands = Brand::all();
        $categories = Category::all();
        $discounts = Discount::all();

        $shoes = DB::table('shoes')->join('categories', 'shoes.id_category', 'categories.id_category')
            ->where('categories.name_category', $category)->paginate(9);
        return view('index')->with('route', 'shop')
            ->with('brands', $brands)
            ->with('categories', $categories)
            ->with('data', $data)
            ->with('discounts', $discounts)
            ->with('shoes', $shoes);
    }

    public function findBrand($brand)
    {
        $data = User::where('id_user', session('Login'))->first();
        $brands = Brand::all();
        $categories = Category::all();
        $discounts = Discount::all();

        $shoes = DB::table('shoes')->join('brands', 'shoes.id_brand', 'brands.id_brand')
            ->where('brands.name_brand', $brand)->paginate(9);

        return view('index')->with('route', 'shop')
        ->with('data',$data)
            ->with('brands', $brands)
            ->with('categories', $categories)
            ->with('discounts', $discounts)
            ->with('shoes', $shoes);
    }

    public function findPrice($p1, $p2)
    {
        $data = User::where('id_user', session('Login'))->first();
        $brands = Brand::all();
        $categories = Category::all();
        $discounts = Discount::all();

        $shoes = DB::table('shoes')->whereBetween(DB::raw('CAST(price AS UNSIGNED)'), [(int)$p1, (int)$p2])->paginate(9);

        return view('index')->with('route', 'shop')
        ->with('data',$data)
            ->with('brands', $brands)
            ->with('categories', $categories)
            ->with('discounts', $discounts)
            ->with('shoes', $shoes);;
    }

    public function newArrivals()
    {
        $data = User::where('id_user', session('Login'))->first();
        $brands = Brand::all();
        $categories = Category::all();
        $discounts = Discount::all();
        $shoes = DB::table('shoes')->orderBy('created_at', 'desc')->paginate(9);

        return view('index')->with('route', 'shop')
        ->with('data',$data)
            ->with('brands', $brands)
            ->with('categories', $categories)
            ->with('shoes', $shoes)
            ->with('discounts', $discounts);
    }

    public function bestSellers()
    {
        $data = User::where('id_user', session('Login'))->first();
        $brands = Brand::all();
        $categories = Category::all();
        $discounts = Discount::all();
        $shoes = DB::table('shoes')->orderBy('quantity_sold', 'desc')->paginate(9);

        return view('index')->with('route', 'shop')
            ->with('brands', $brands)
            ->with('data',$data)
            ->with('categories', $categories)
            ->with('shoes', $shoes)
            ->with('discounts', $discounts);
    }

    public function productDetail($id)
    {
        $data = User::where('id_user', session('Login'))->first();
        $brands = Brand::all();
        $categories = Category::all();
        $discounts = Discount::all();
        $shoe = Shoe::find($id);
        $feedbacks = DB::table('feedback')->where('id_shoe', $shoe['id_shoe'])->paginate(5);

        //count feedback
        $countFB = array();
        $countFB['count_fb'] = DB::table('feedback')->where('id_shoe', $shoe['id_shoe'])->count();
        $countFB['avgRated'] = DB::table('feedback')->where('id_shoe', $shoe['id_shoe'])->avg('rated');

        //find similar shoes
        if (
            Shoe::where('id_brand', $shoe->id_brand)->where('id_category', $shoe->id_category)
            ->where('id_shoe', '!=', $shoe->id_shoe)->count() < 4
        ) {
            $similarShoes = Shoe::where('id_brand', $shoe->id_brand)->where('id_shoe', '!=', $shoe->id_shoe)
                ->orWhere('id_category', $shoe->id_category)->where('id_shoe', '!=', $shoe->id_shoe)
                ->get();
        } else {
            $similarShoes = Shoe::where('id_brand', $shoe->id_brand)->where('id_category', $shoe->id_category)
                ->where('id_shoe', '!=', $shoe->id_shoe)->get();
        }

        return view('index')->with('route', 'product')
            ->with('data', $data)
            ->with('brands', $brands)
            ->with('categories', $categories)
            ->with('shoe', $shoe)
            ->with('discounts', $discounts)
            ->with('feedbacks', $feedbacks)
            ->with('countFB', $countFB)
            ->with('similarShoes', $similarShoes);
    }

    //user feedback
    public function feedback($id, Request $request)
    {
        $data = User::where('id_user', session('Login'))->first();
        $check = 0;
        $feedbacks = Feedback::all();
        foreach($feedbacks as $feedback) {
            if(($feedback['id_user'] == $request->input('id_user')) && ($feedback['id_shoe'] == $id)){
                $check = 1;
            } else {
                $check = 0;
            }
        }

        if ($check == 1) {


            $tmp= DB::table('feedback')->where('id_shoe', $id)->first();
            //update
            $fb = Feedback::find($tmp->id_feedback);
            $fb['username'] = $request->input('username');
            $fb['rated'] = $request->input('rated');
            $fb['comment'] = $request->input('comment');
            $fb->save();
            
        } else {
            Feedback::create([
            'id_shoe' => $id,
            'id_user' => $request->input('id_user'),
            'username' => $request->input('user_name'),
            'rated' => $request->input('rated'),
            'comment' => $request->input('comment'),
            
            ]);
        }
        
        return Redirect('/shop/product='.$id);
    }

    public function sale()
    {
        $data = User::where('id_user', session('Login'))->first();
        $brands = Brand::all();
        $categories = Category::all();
        $discounts = Discount::all();

        $shoes10 = DB::table('shoes')->join('discount', 'shoes.id_discount', '=', 'discount.id_discount')
            ->where(DB::raw('CAST(discount.discount_value AS UNSIGNED)'), '=', 10)->select('shoes.*')->get();

        $shoes20 = DB::table('shoes')->join('discount', 'shoes.id_discount', '=', 'discount.id_discount')
            ->whereBetween(DB::raw('CAST(discount.discount_value AS UNSIGNED)'), [20, 29])->select('shoes.*')->get();

        $shoes30 = DB::table('shoes')->join('discount', 'shoes.id_discount', '=', 'discount.id_discount')
            ->whereBetween(DB::raw('CAST(discount.discount_value AS UNSIGNED)'), [30, 40])->select('shoes.*')->get();

        return view('index')->with('route', 'sale')
            ->with('brands', $brands)
            ->with('data',$data)
            ->with('categories', $categories)
            ->with('shoes10', $shoes10)
            ->with('shoes20', $shoes20)
            ->with('shoes30', $shoes30)
            ->with('discounts', $discounts);
    }


    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
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
    }

    function logout()
    {
        if (session()->has('Login')) {
            session()->pull('Login');
            session()->put('check', '0');
            return redirect('/');
        }
        session()->put('check', '0');
        return redirect('/');
    }

    // Register;
    public function saveRegister(Request $request){
        $request->validate([
            'fullname' => 'required',
            'email' => 'required | email | unique:users',
            'phone_number' => 'required',
            'username' => 'required | unique:users',
            'password' => 'required | min:5 | confirmed',
            'id_role' => 'required',
        ],[
            'email.unique' => '* Email already exists.',
            'username.unique' => '* Username already exists.',
            'password.min' => '* Password must contain at least 5 characters.',
            'password.confirmed' => '* The confirmation password entered is incorrect.',
        ]);

        User::create([
            'fullname' => $request->input('fullname'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'id_role' => '2',
        ]);

        return redirect()->route('auth.login');
    }
}
