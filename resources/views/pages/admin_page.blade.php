@extends('layouts.app')

@section('content')
<h1>Admin page</h1>

<div class="row">
    <div class="col-md-6">
        <h3>Please insert new product in your shop</h3>
        {!! Form::open(['action' => 'ProductsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>    
            <div class="form-group">
                {{Form::label('provider', 'Provider')}}
                <select name="provider">
                    @if(count($providers) > 0)
                        <option> Please select a provider </option>
                        @foreach($providers as $provider)
                            <option value="{{$provider->id}}">{{ $provider->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
            </div> 
            <div class="form-group">
                {{Form::label('price', 'Price')}}
                {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Price'])}}
            </div> 
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
    <div class="col-md-6">
        <h3>Insert a new provider!</h3>
        {!! Form::open(['action' => 'ProvidersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Insert provider name..'])}}
            </div>    
            <div class="form-group">
                {{Form::label('address', 'Address')}}
                {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Insert provider address..'])}}
            </div> 
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
</div>
@endsection