@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <img src="/storage/cover_images/{{$product->cover_image}}" style="width:100%;">
        </div>
        <div class="col-md-8">
            <h2>{{$product->name}}</h2>
            <p>{{$product->description}}</p>
            <p>Price: {{$product->price}}</p>
            @guest
                <a href="/login" class="btn btn-info float-right float-bottom"> Login into your account to buy this item!</a>
            @else
            {!!Form::open(['action' => ['BascketController@store'], 'method' => 'POST'])!!}
                {{Form::text('id', $product->id, ['style' =>'visibility:hidden;'])}}
                {{Form::label('quantity', 'Quantity: ', ['class' => 'float-left'])}}
                {{Form::text('quantity', '1', ['class' => 'form-control, float-left', 'placeholder' => 'Insert quantity..', 'style' => 'margin-left: 5px;'])}}
                {{Form::submit('Add to basket!', ['class' => 'btn btn-info'])}}
            {!!Form::close()!!}
            @endguest            
        </div>
    </div>
@endsection