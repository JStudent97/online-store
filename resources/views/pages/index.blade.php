@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1 id='head_title'>Hello and Welcome to my Online store </h1>
        <p id="head_paragraph"> This is a new web store created for SGI</p>
    </div>
    <h2 id="select_title">Please select the item you wish to buy!</h2>

    @if(count($products) > 0)
        <div class="row">
        @foreach($products as $product)
            <div class="col-md-3  product-div">
                <div class="inner card card-body bg-light">
                    <img style="width:100%; max-height:150px;" src="/storage/cover_images/{{$product->cover_image}}">
                    <h4>{{$product->name}}</h4>
                    <p>{{$product->price}} Lei</p>
                    <a href="products/{{$product->id}}" class="btn btn-default"> See more!</a>
                </div>
            </div>
        @endforeach
        </div>
    @endif
@endsection

