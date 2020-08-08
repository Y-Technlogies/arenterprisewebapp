@extends('mainlayouts.app')

@section('content')
    <h1>Create Product</h1>
    {!! Form::open(['action' => ['ProductController@update', $product->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data'])!!}
    <div class="form-row">
        <div class="form-group col-md-3">
            {{Form::label('product_serial', 'Product serial number')}}
            {{Form::text('product_serial', $product->product_serial, ['class' => 'form-control', 'placeholder' => 'Product serial number'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('name', 'Product Name')}}
            {{Form::text('name', $product->name, [ 'class' => 'form-control', 'placeholder' => 'Product Name'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('type', 'Type')}}
            {{Form::select('type', ['mechanical' => 'Mechanical','industrial' => 'Industrial'], $product->type,['class' => 'form-control'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3" >
            {{Form::label('quantity', 'Quantity')}}
            {{Form::text('quantity', $product->quantity, [ 'class' => 'form-control', 'placeholder' => 'Quantity'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('price', 'Price')}}
            {{Form::text('price', $product->price, [ 'class' => 'form-control', 'placeholder' => 'Price'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('stock', 'Stock')}}
            {{Form::text('stock', $product->stock, [ 'class' => 'form-control', 'placeholder' => 'Stock'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-1">
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Update', ['class'=>'btn btn-dark'])}}
            {!! Form::close() !!}
        </div>
        <div class="col-md-1">
            {!!Form::open(['action' => ['ProductController@destroy', $product->id], 'method' => 'DELETE'])!!}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        </div>

    </div>

@endsection

