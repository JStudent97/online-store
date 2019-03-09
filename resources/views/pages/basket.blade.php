@extends('layouts.app')
<?php 
    $user_id = auth()->user()->id;
?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Basket</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>The products currently in your basket</h3>
                    @if(count($products) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Quantity</th>
                            <th>Price (Unit Price)</th>
                            <th></th>
                        </tr>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->price * $product->quantity}} ( {{$product->price}} )  lei </td>
                                <td>
                                    {!!Form::open(['action' => ['BascketController@destroy', $product->id, auth()->user()->id], 'method' => 'POST', 'class' => "float-right"])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Remove from basket!', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <?php  
                          
                    ?>
                     {!!Form::open(['action' => ['OrdersController@store'], 'method' => 'POST'])!!}
                        {{ Form::text('user_id', $user_id, ['style' =>'visibility:hidden;']) }}
                        {{ Form::text('products', serialize($products), ['style' =>'visibility:hidden;']) }}
                        {{Form::submit('Buy!', ['class' => 'btn btn-info'])}}
                     {!!Form::close()!!}
                    @else
                        <p>You have no products in your basket! </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection