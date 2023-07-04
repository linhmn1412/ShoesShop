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
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{

    public function index()
    {
        if(session()->get(key:'cart') == null){
            $cart = array();
            session()->put('cart', $cart);
        }
        $lenCart = count((session()->get(key:'cart')));
        
        $data = User::where('id_user', session('Login'))->first();
        $brands = Brand::all();
        $categories = Category::all();
        $shoes = Shoe::all();
        $discounts = Discount::all();
        $bestsellers = DB::table('shoes')->orderBy('quantity_sold', 'desc')->get();
        $newshoes = DB::table('shoes')->orderBy('created_at', 'desc')->get();

        return view('index')->with('route', 'home')
            ->with('lenCart',$lenCart)
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
        if(session()->get(key:'cart') == null){
            $cart = array();
            session()->put('cart', $cart);
        }
        $lenCart = count((session()->get(key:'cart')));
        $data = User::where('id_user', session('Login'))->first();
        $brands = Brand::all();
        $categories = Category::all();
        $discounts = Discount::all();
        $shoes = Shoe::paginate(9);

        return view('index')->with('route', 'shop')
            ->with('lenCart', $lenCart)
            ->with('data', $data)
            ->with('brands', $brands)
            ->with('categories', $categories)
            ->with('shoes', $shoes)
            ->with('discounts', $discounts);
    }

    public function findCategory($category)
    {
        if(session()->get(key:'cart') == null){
            $cart = array();
            session()->put('cart', $cart);
        }
        $lenCart = count((session()->get(key:'cart')));
        $data = User::where('id_user', session('Login'))->first();
        $brands = Brand::all();
        $categories = Category::all();
        $discounts = Discount::all();

        $shoes = DB::table('shoes')->join('categories', 'shoes.id_category', 'categories.id_category')
            ->where('categories.name_category', $category)->paginate(9);
        return view('index')->with('route', 'shop')
        ->with('lenCart', $lenCart)
            ->with('brands', $brands)
            ->with('categories', $categories)
            ->with('data', $data)
            ->with('discounts', $discounts)
            ->with('shoes', $shoes);
    }

    public function findBrand($brand)
    {
        if(session()->get(key:'cart') == null){
            $cart = array();
            session()->put('cart', $cart);
        }
        $lenCart = count((session()->get(key:'cart')));
        $data = User::where('id_user', session('Login'))->first();
        $brands = Brand::all();
        $categories = Category::all();
        $discounts = Discount::all();

        $shoes = DB::table('shoes')->join('brands', 'shoes.id_brand', 'brands.id_brand')
            ->where('brands.name_brand', $brand)->paginate(9);

        return view('index')->with('route', 'shop')
            ->with('data', $data)
            ->with('lenCart', $lenCart)
            ->with('brands', $brands)
            ->with('categories', $categories)
            ->with('discounts', $discounts)
            ->with('shoes', $shoes);
    }

    public function findPrice($p1, $p2)
    {
        if(session()->get(key:'cart') == null){
            $cart = array();
            session()->put('cart', $cart);
        }
        $lenCart = count((session()->get(key:'cart')));
        $data = User::where('id_user', session('Login'))->first();
        $brands = Brand::all();
        $categories = Category::all();
        $discounts = Discount::all();

        $shoes = DB::table('shoes')->whereBetween(DB::raw('CAST(price AS UNSIGNED)'), [(int)$p1, (int)$p2])->paginate(9);

        return view('index')->with('route', 'shop')
            ->with('data', $data)
            ->with('brands', $brands)
            ->with('lenCart', $lenCart)
            ->with('categories', $categories)
            ->with('discounts', $discounts)
            ->with('shoes', $shoes);;
    }

    public function newArrivals()
    {
        if(session()->get(key:'cart') == null){
            $cart = array();
            session()->put('cart', $cart);
        }
        $lenCart = count((session()->get(key:'cart')));
        $data = User::where('id_user', session('Login'))->first();
        $brands = Brand::all();
        $categories = Category::all();
        $discounts = Discount::all();
        $shoes = DB::table('shoes')->orderBy('created_at', 'desc')->paginate(9);

        return view('index')->with('route', 'shop')
            ->with('data', $data)
            ->with('lenCart', $lenCart)
            ->with('brands', $brands)
            ->with('categories', $categories)
            ->with('shoes', $shoes)
            ->with('discounts', $discounts);
    }

    public function bestSellers()
    {
        if(session()->get(key:'cart') == null){
            $cart = array();
            session()->put('cart', $cart);
        }
        $lenCart = count((session()->get(key:'cart')));
        $data = User::where('id_user', session('Login'))->first();
        $brands = Brand::all();
        $categories = Category::all();
        $discounts = Discount::all();
        $shoes = DB::table('shoes')->orderBy('quantity_sold', 'desc')->paginate(9);

        return view('index')->with('route', 'shop')
            ->with('brands', $brands)
            ->with('data', $data)
            ->with('lenCart', $lenCart)
            ->with('categories', $categories)
            ->with('shoes', $shoes)
            ->with('discounts', $discounts);
    }

    public function productDetail($id)
    {
        if(session()->get(key:'cart') == null){
            $cart = array();
            session()->put('cart', $cart);
        }
        $lenCart = count((session()->get(key:'cart')));
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
        //product
        $cart = session()->get(key:'cart');
        if(!$cart){$cart = array();}

        return view('index')->with('route', 'product')
            ->with('data', $data)
            ->with('brands', $brands)
            ->with('categories', $categories)
            ->with('shoe', $shoe)
            ->with('lenCart', $lenCart)
            ->with('discounts', $discounts)
            ->with('feedbacks', $feedbacks)
            ->with('countFB', $countFB)
            ->with('cart', $cart)
            ->with('similarShoes', $similarShoes);
    }

    //user feedback
    public function feedback($id, Request $request)
    {
        $check = 0;
        $feedbacks = Feedback::all();
        foreach ($feedbacks as $feedback) {
            if (($feedback['id_user'] == $request->input('id_user')) && ($feedback['id_shoe'] == $id)) {
                $check = 1;
            } else {
                $check = 0;
            }
        }

        if ($check == 1) {


            $feedback = DB::table('feedback')->where('id_shoe', $id)->first();
            //update
            $fb = Feedback::find($feedback->id_feedback);
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

        return Redirect('/shop/product=' . $id);
    }

    public function sale()
    {
        if(session()->get(key:'cart') == null){
            $cart = array();
            session()->put('cart', $cart);
        }
        $lenCart = count((session()->get(key:'cart')));
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
            ->with('data', $data)
            ->with('categories', $categories)
            ->with('shoes10', $shoes10)
            ->with('lenCart', $lenCart)
            ->with('shoes20', $shoes20)
            ->with('shoes30', $shoes30)
            ->with('discounts', $discounts);
    } 
}
