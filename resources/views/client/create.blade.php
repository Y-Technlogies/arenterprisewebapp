@extends('mainlayouts.app')

@section('content')
    <h1>Create Client</h1>
    {!! Form::open(['class' => 'form-inline', 'action' => 'ClientController@store', 'method' => 'CLIENTS', 'enctype' => 'multipart/form-data'])!!}
    <div class="form-group col-md-3">
        {{Form::label('clientsn', 'Client serial number')}}
        {{Form::text('clientsn', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Client serial number'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('companyname', 'Company Name')}}
        {{Form::text('companyname', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Company Name'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('propname', 'Proprietor Name')}}
        {{Form::text('propname', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder'=>'Proprietor name'])}}
    </div>
   <div class="form-group col-md-3" >
        {{Form::label('propphone1', 'Proprietor Number #1')}}
        {{Form::text('propphone1', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Proprietor contact'])}}
    </div>
    <div class="form-group col-md-3" >
        {{Form::label('propphone2', 'Proprietor Number#2')}}
        {{Form::text('propphone2', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Proprietor contact'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('assistant', 'Assistant')}}
        {{Form::text('assistant', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Assistant name'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('asstphone1', 'Assistant  Number #1')}}
        {{Form::text('asstphone1', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Assistant contact'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('asstphone2', 'Assistant  Number #2')}}
        {{Form::text('asstphone2', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Assistant contact'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('bussphone', 'Business Phone')}}
        {{Form::text('bussphone', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Business Phone'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('email', 'Company Email')}}
        {{Form::text('email', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Email'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('destination', 'Destination')}}
        {{Form::text('destination', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Destination'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('transport', 'Transport')}}
        {{Form::text('transport', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Transport'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('shipping_address', 'Transport address')}}
        {{Form::text('shipping_address', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Transport address'])}}
    </div>
    <div class="form-group col-md-4">
        {{Form::label('address', 'Address')}}
        {{Form::textarea('address', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'rows' => '3', 'placeholder' => 'Address'])}}
    </div>
    <div class="col-sm-offset-2 col-sm-10">
    {{Form::submit('Submit', ['class'=>'btn btn-dark'])}}
    {!! Form::close() !!}
    </div>
@endsection

