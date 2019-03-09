<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $orders = [];
        $order_ids = DB::select("SELECT DISTINCT order_id FROM orders WHERE user_id = $user_id");
        foreach($order_ids as $order_id){
           $orders[] = DB::select("SELECT * FROM orders WHERE order_id = $order_id->order_id");
        }
        //return count($order_ids);
        return view('pages.orders')->with('order_ids', $order_ids);
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
        $products = unserialize($request->products);
        $user_id = auth()->user()->id;

        //get the max index from database
        $query_index = DB::select("SELECT MAX(order_id) AS 'Index' from orders");
        $index = $query_index[0]->Index;

        //insert items in orders table
        if($index == NULL){
            foreach($products as $product){
                DB::insert("INSERT INTO orders (order_id, user_id, produs_id, quantity) VALUES (1, $request->user_id, $product->id, $product->quantity)");
            }
        } else {
            $index = $index + 1;
            foreach($products as $product){
                DB::insert("INSERT INTO orders (order_id, user_id, produs_id, quantity) VALUES ($index, $request->user_id, $product->id, $product->quantity)");
            }
        }

        //delete items from the basket
        DB::delete("DELETE FROM bascket WHERE user_id = $user_id");
        return redirect('/')->with('success', 'Order successfuly placed! You can see it in your Order History!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 'functia show' . $id;
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
    public function destroy($id)
    {
        //
    }
}
