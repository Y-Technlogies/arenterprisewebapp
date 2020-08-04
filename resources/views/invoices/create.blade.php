@extends('mainlayouts.app')

@section('content')
    <h1>Create Invoice</h1>
    {!! Form::open(['class' => 'form-inline', 'action' => 'AgentsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    <div class="form-group col-md-3">
        {{Form::label('invoiceno', 'Invoice number')}}
        {{Form::text('agents_sn', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Invoice number'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('clientaddress', 'Client Address')}}
        {{Form::text('clientaddress', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Client Address'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('invoicetitle', 'Invoice Title')}}
        {{Form::text('invoicetitle', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder'=>'Title'])}}
    </div>
   <div class="form-group col-md-3" >
        {{Form::label('clientname', 'Client Name')}}
        {{Form::text('clientname', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Client Name'])}}
    </div>
    <div class="form-group col-md-3" >
        {{Form::label('product', 'Product Name')}}
        {{Form::text('product', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Product Name'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('salesdivision', 'Sales Division')}}
        {{Form::text('salesdivision', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Sales Division'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('price', 'Product Price')}}
        {{Form::text('price', '', ['id' => 'article-ckeditor', 'class' => 'form-control',  'placeholder' => 'Price'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('quantity', 'Quantity')}}
        {{Form::text('quantity', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Quantity'])}}
    </div>
    <br>
    <br>
    <div class="form-group col-md-3">
        {{Form::label('invoicedate', 'Invoice Date')}}
        {{Form::text('invoicedate', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Invoice Date'])}}
    </div> 
    <div class="form-group col-md-3">
        {{Form::label('duedate', 'Due Date')}}
        {{Form::text('duedate', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Due Date'])}}
    </div> 
    <div class="form-group col-md-3">
        {{Form::label('totalbill', 'Total bill')}}
        {{Form::text('totalbill', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Total bill'])}}
    </div> 
    <div></div> 
    <div class="form-group col-md-3">
    {{Form::submit('Submit', ['class'=>'btn btn-dark'])}}
    {!! Form::close() !!}
    </div>
@endsection

