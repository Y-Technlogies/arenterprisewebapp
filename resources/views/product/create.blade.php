@extends('mainlayouts.app')

@section('content')
    <h1>Create Product</h1>
    {!! Form::open(['action' => 'ProductController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    {{ csrf_field() }}
    <div class="form-row">
        <div class="form-group col-md-3">
            {{Form::label('product_serial', 'Product serial number')}}
            {{Form::text('product_serial', '', ['class' => 'form-control', 'placeholder' => 'Product serial number'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('name', 'Product Name')}}
            {{Form::text('name', '', [ 'class' => 'form-control', 'placeholder' => 'Product Name'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('type', 'Type')}}
            {{Form::select('type', ['mechanical' => 'Mechanical','industrial' => 'Industrial'], '',['class' => 'form-control'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3" >
            {{Form::label('quantity', 'Quantity')}}
            {{Form::text('quantity', '', [ 'class' => 'form-control', 'placeholder' => 'Quantity'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('price', 'Price')}}
            {{Form::text('price', '', [ 'class' => 'form-control', 'placeholder' => 'Price'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('stock', 'Stock')}}
            {{Form::text('stock', '', [ 'class' => 'form-control', 'placeholder' => 'Stock'])}}
        </div>
    </div>
    <div class="form-group col-md-12 pl-0">
        {{Form::submit('Save', ['class'=>'btn btn-dark'])}}
    </div>
    {!! Form::close() !!}

@endsection

