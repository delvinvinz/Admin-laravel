<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductSold;
class ProductController extends Controller
{
    public function index(Request $request){
        $products = Product::orderBy('sold','ASC');
        if($request->sort == 'asc'){
            $products = $products->orderBy('name', 'ASC')->get();
        }else if($request->sort == 'desc'){
            $products = $products->orderBy('name', 'DESC')->get();
        }else{
            $products = $products->orderBy('created_at', 'DESC')->orderBy('updated_at', 'DESC')->get();
        }

        return view('pages.products', compact('products'));

    }

    public function create(){
        return view('pages.create');
    }

    public function store(Request $request){
        if($request->price < 100.000){
            return back()->with('error', 'minimal harga Rp 100.000');
        }


        $file = $request->file('image');
        $fileName = 'product_' . time() . '.' . $file->extension();
        $file->move(public_path('assets/img'), $fileName);

        Product::create([
            'name' => $request->name,
            'image' => $fileName,
            'description' => $request->description,
            'price' => $request->price,
            'sold' => "0",
            'user_id' => Auth::user()->id,
        ]);

        return back()->with('success', 'Congratulations, your product has been successfully created. Wait until your product is sold');
    }

    public function buy($id){
        $product = Product::findOrFail($id);

        // pembelian gagal
        if($product->user_id == Auth::user()->id ){
            return back()->with('error', "Purchase failed, you can't buy your own product");
        }

        ProductSold::create([
            'product_id' => $product->id,
            'buyer_id' => Auth::user()->id,
        ]);

        $product->update([
            'sold' => true,
        ]);

        return back()->with('success', 'Congratulations, the product has been purchased successfully');
    }
    public function my(){
        $products = Product::where('user_id', Auth::user()->id)->orderBy('sold',
        'asc')->get();
        return view('pages.my', compact('products'));
    }

    public function delete($id){
        $product = Product::findOrfail($id);
        $product->delete();
        return redirect()->route('product.my')->with('success', 'data successfully deleted');
    }
}
