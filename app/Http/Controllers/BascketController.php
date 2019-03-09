<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Bascket;
use App\Product;

class BascketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        //$registrations = Bascket::where('user_id', $user_id)->get();
        $registrations = DB::select("SELECT Product.name, Product.price, Bascket.quantity, Product.id FROM Product, Bascket WHERE Bascket.user_id = $user_id AND Product.id = Bascket.product_id");
       /* $products_array = [];
        foreach($registrations as $registration){
            $products_array[] = Product::where('id', $registration->product_id)->get();
        }*/
        //return dump($registrations);
        //return dump($products_array[0]);
        $order_sign = 0;
        return view('pages.basket')->with(['products' => $registrations, 'order_sign' => $order_sign]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item_to_store = new Bascket;
        $item_to_store->product_id = $request->input('id');
        $item_to_store->user_id = auth()->user()->id;
        $item_to_store->quantity = $request->input('quantity');
        $item_to_store->save();
        return redirect('/')->with('success', 'Product added to your basket!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $user_id)
    {
        //$product = Bascket::where('product_id', $product_id)->where('user_id', $user_id)->get()->each->delete;
        $registration = DB::delete("DELETE from bascket where product_id = $product_id and user_id = $user_id");
        //return $product;
        return redirect('/bascket')->with('success', 'Product successfuly removed from your basket!');
    }
}
