<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Model\Product;

class ProductController extends Controller
{
    public function index(){
        $products = product::with([
            'categories:id,name'
        ])->get();
        return response()->json(['products' => $products], 200);
    }

    public function store(Request $request)
    {

        $product = new product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->category_id = $request->category_id;
        $product->save();
        return response()->json(['product' => $product]);
    }
}
