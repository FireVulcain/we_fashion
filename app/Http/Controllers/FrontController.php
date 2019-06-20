<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

/**
 * @property  $paginate - number of product per page
 */
class FrontController extends Controller
{
    protected $paginate = 6;

    public function index(){
        $products = Product::published()->paginate($this->paginate);
        return view('front.index', ['products' => $products]);
    }

    public function show($id){
        $products = Product::find($id);
        return view('front.show', ['products' => $products]);
    }

    public function sales(){
        $products = Product::published()->sales()->paginate($this->paginate);
        return view('front.sales', ['products' => $products]);
    }

    public function categories($id){
        $products = Product::published()->categories($id)->paginate($this->paginate);
        return view('front.categories', ['products' => $products]);
    }
}
