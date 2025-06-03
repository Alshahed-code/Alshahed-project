<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function home() {
        $query = Product::query();
        $product = $query->paginate(3);
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }
        
        return view('home.index', compact('product', 'count'));
    }

    public function login_home() {
        $product = Product::all();
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }
        
        return view('home.index', compact('product', 'count'));
    }

    public function product_details($id) {
        $product = Product::all();
        $data = Product::find($id);
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }
        
        return view('home.product_details', compact('data', 'count', 'product'));
    }

    public function our_shop() {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
        } else {
            $count = '';
        }
        $category = Category::all();
        $product = Product::all();

        return view('home.shop_page', compact('category', 'product', 'count'));
    }

    public function category_products($id) {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
        } else {
            $count = '';
        }
        $category = Category::all();
        $selected_category = Category::find($id);
        $product = Product::where('category_id', $id)->get();

        return view('home.shop_page', compact('category', 'product', 'selected_category', 'count'));
    }

    public function add_cart($id){
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();
            toastr()->timeOut(10000)->closeButton()->addSuccess('Product Added to the Cart Successfully');
        return redirect()->back();
    }

    public function mycart() {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
        } else {
            $count = '';
        }
        return view('home.mycart', compact('count', 'cart'));
    }

    public function delete_cart($id) {
        $data = Cart::find($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Cart Deleted Successfully');
        return redirect()->back();
    }
    public function checkout() {
        $cart = Cart::where('user_id', Auth::id())->get();
        $value = 0;
        foreach($cart as $item) {
            $value += $item->product->price;
        }
        return view('home.checkout', compact('cart', 'value'));
    }

}
