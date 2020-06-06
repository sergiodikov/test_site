<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('index', compact('products'));
    }
    public function categories(){
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category($codeCategory){
        $category = Category::where('code', $codeCategory)->first();
        if (empty($category)) {
            abort(404);
        }
        return view ('category', compact('category'));

    }
    public function product($category, $product = null){
        return view('product' ,['product' =>$product]);
    }


}

