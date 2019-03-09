@extends('layouts.app')

<?php
    $orders_count = 1;
?>

@section('content')
    <h1>Your orders</h1>
    @if(count($order_ids) > 0)
        @foreach($order_ids as $order_id)
            <h3> Order {{$orders_count}} </h3>
            <ul>
            <?php  
                $orders_count++;
                $orders_array = [];
                $items = DB::select("SELECT * FROM orders WHERE order_id = $order_id->order_id");
                foreach($items as $item){
                    $name = DB::select("SELECT name FROM product WHERE id = $item->produs_id");
                    $name_out = $name[0]->name;
                    echo "<li> $item->quantity x $name_out </li>";
                }
            ?>
            </ul>
        @endforeach
    @else 
        <p> You have not bought anything so far! Go check our store and don't miss any offer! </p>
    @endif
@endsection