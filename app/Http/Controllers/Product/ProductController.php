<?php

namespace App\Http\Controllers\Product;

use App\Product;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('created_at', 'asc')->get();
	   return view('products.index', [
		'products' => $products
	   ]);
    }
	
	/**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
        ]);
    }

    /**
     * Create a new product.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {		
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
		
        $product = new Product;
	   $product->name = $request->name;
	   $product->save();

        return redirect('/products');
    }
	
    /**
     * Delete a product.
     *
     * @param  Request  $request
     * @return Response
     */
    public function destroy()
    {
		$product = Product::find($product->id);

		$product->delete();

		return redirect('/products');
	}
}
