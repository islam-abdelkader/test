<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', ['products' => Product::latest()->with('categories')->paginate(8)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'products.create',
            [
                'main_categories' => Category::whereNull('category_id')->get()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create(['name' => $request->name]);
        $product->categories()->sync([$request->main_category, $request->sub_category]);
        return redirect()->route('products.index')->with('success',"''$product->name'' product added successfully.");
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
    public function edit(Product $product)
    {
        $main_categories = Category::whereNull('category_id')->get();
        $parent_cat = $product->categories[0]->isParent() ? $product->categories[0] : $product->categories[1];
        $sub_cat = $product->categories[1]->isChild() ? $product->categories[1] : $product->categories[0];
        return view('products.edit',get_defined_vars());
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update(['name'=>$request->name]);
        $product->categories()->sync([$request->main_category,$request->sub_category]);
        return redirect()->route('products.index')->with('success',"'$product->name' product updated successfully.");
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
