<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ApiController extends Controller
{
    public function showAll(Request $request) {
        return $products = Product::all();
    }


    public function showAllProductsInCategory(Request $request, $category) {
        $products = Product::where('product_category', $category)
                            ->orderBy('product_id', 'asc')
                            ->get();
        if($products->isEmpty()) {
            return response()->json(['message' => 'Product category does not exist'], 404);
        }
        return response()->json($products, 200);
    }

    public function showProduct(Request $request, $category, $id) {
        $product = Product::where('product_category', $category)
                            ->where('product_id', $id)
                            ->get();
        if(is_null($product)) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product, 200);
    }

    public function createProduct(Request $request, $id) {

        $product = Product::create([
            'product_id' => $id,
            'product_name' => $request->product_name,
            'product_desc' => $request->product_desc,
            'product_category' => $request->product_category,
            'product_price' => $request->product_price,
        ]);
        $product = Product::find($id);
        return response()->json($product, 201);
    }

    public function updateProduct(Request $request, $id) {
        $product = Product::find($id);
        if(is_null($product)) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->update($request->all());
        return response()->json($product, 201);
    }

    public function deleteProduct(Request $request, $id) {
        $product = Product::find($id);
        if(is_null($product)) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->delete();
        return response()->json(['deleted' => $product->product_name], 200);
    }
}
