<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Product;
use App\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Number of element per page
     * @var int
     */
    protected $paginate = 15;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate($this->paginate);
        return view('back.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::pluck('name', 'id')->all();
        $sizes = Size::pluck('name', 'id')->all();
        return view('back.product.create', ['categories' => $categories, 'sizes' => $sizes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:5|max:100',
            'description' => 'required',
            'price' => 'required|numeric',
            'picture' => 'required|image:max:3000',
            'status' => 'required|in:published,unpublished',
            'sales' => 'required|in:sale,standard',
            'reference' => 'required|alpha_num|min:16|max:16',
            'categorie_id' => 'required|integer',
            'sizes' => 'required'
        ]);


        // Store the image inside a folder named 'products'
        $file = $request->file('picture');
        if(!empty($file)){
            $file->store('products');
        }


        // Get img name
        $imgName = $request->picture->hashName();

        // store the datas && rewrite "$datas['picture']" as a path
        $datas = $request->all();
        $datas['picture'] =  'products/' . $imgName;

        // insert the datas inside the database
        $product = Product::create($datas);
        $product->size()->attach($request->sizes);

        return redirect()->route('products.index')->with('message', 'Produit ajouté avec succès !');
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
        $products = Product::find($id);
        $categories = Categorie::pluck('name', 'id')->all();
        $sizes = Size::pluck('name', 'id')->all();

        return view('back.product.edit', ['products' => $products, 'categories' => $categories, 'sizes' => $sizes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:100',
            'description' => 'required',
            'price' => 'required|numeric',
            'picture' => 'image:max:3000',
            'status' => 'required|in:published,unpublished',
            'sales' => 'required|in:sale,standard',
            'reference' => 'required|alpha_num|min:16|max:16',
            'categorie_id' => 'required|integer',
            'sizes' => 'required'
        ]);

        // store the datas
        $datas = $request->all();


        // Store the image inside a folder named 'products' if the picture exist
        $file = $request->file('picture');
        if(!empty($file)){
            $file->store('products');
            $imgName = $request->picture->hashName();
            $datas['picture'] =  'products/' . $imgName; // Rewrite "$datas['picture']" as a path
        }


        // update the datas inside the database
        $product = Product::find($id);
        $product->update($datas);
        $product->size()->sync($request->sizes);

        return redirect()->route('products.index')->with('message', 'Votre produit a bien été mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();
        return redirect()->route('products.index');
    }
}