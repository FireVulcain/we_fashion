<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

/**
 * @property  $paginate - number of product per page
 */
class FrontController extends Controller
{

    /**
     * Number of element per page
     * @var int
     */
    protected $paginate = 6;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $products = Product::published()->paginate($this->paginate);
        return view('front.index', ['products' => $products]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
        $products = Product::find($id);
        return view('front.show', ['products' => $products]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sales(){
        $products = Product::published()->sales()->paginate($this->paginate);
        return view('front.sales', ['products' => $products]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categories($id){
        $products = Product::published()->categories($id)->paginate($this->paginate);
        return view('front.categories', ['products' => $products]);
    }
}
