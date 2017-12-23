<?php
 
namespace App\Http\Controllers;
 
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
class ProductController extends Controller
{

	public function createProduct(Request $request)
	{
			$product = Product::create($request->all());
			
			return response()->json($product);
	}
 
	public function updateProduct(Request $request, $id)
	{
      $product = Product::find($id);
      $product->name = $request->input('name');
      $product->sku = $request->input('sku');
      $product->description = $request->input('description');
      $product->available = $request->input('available');
      
      $product->save();
      return response()->json($product);
	}  

	public function deleteProduct($id)
	{  
      $product = Product::find($id);
      $product->delete();

      return response()->json('Product was correctly deleted');
	}

	public function index()
	{
      $products = Product::all();
 
      return response()->json($products);
	}
}
