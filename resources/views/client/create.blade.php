@extends('mainlayouts.app')

@section('content')
    <h1>Create Client</h1>
    {!! Form::open(['action' => 'ClientController@store', 'method' => 'CLIENTS', 'enctype' => 'multipart/form-data'])!!}
    <div class="form-row">
        <div class="form-group col-md-3">
            {{Form::label('clientsn', 'Client serial number')}}
            {{Form::text('clientsn', '', ['class' => 'form-control', 'placeholder' => 'Client serial number'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('companyname', 'Company Name')}}
            {{Form::text('companyname', '', [ 'class' => 'form-control', 'placeholder' => 'Company Name'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('propname', 'Proprietor Name')}}
            {{Form::text('propname', '', [ 'class' => 'form-control', 'placeholder'=>'Proprietor name'])}}
        </div>
        <div class="form-group col-md-3" >
            {{Form::label('propphone1', 'Proprietor Number #1')}}
            {{Form::text('propphone1', '', [ 'class' => 'form-control', 'placeholder' => 'Proprietor contact'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3" >
            {{Form::label('propphone2', 'Proprietor Number#2')}}
            {{Form::text('propphone2', '', [ 'class' => 'form-control', 'placeholder' => 'Proprietor contact'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('assistant', 'Assistant')}}
            {{Form::text('assistant', '', [ 'class' => 'form-control', 'placeholder' => 'Assistant name'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('asstphone1', 'Assistant  Number #1')}}
            {{Form::text('asstphone1', '', [ 'class' => 'form-control', 'placeholder' => 'Assistant contact'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('asstphone2', 'Assistant  Number #2')}}
            {{Form::text('asstphone2', '', [ 'class' => 'form-control', 'placeholder' => 'Assistant contact'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            {{Form::label('bussphone', 'Business Phone')}}
            {{Form::text('bussphone', '', [ 'class' => 'form-control', 'placeholder' => 'Business Phone'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('email', 'Company Email')}}
            {{Form::text('email', '', [ 'class' => 'form-control', 'placeholder' => 'Email'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('destination', 'Destination')}}
            {{Form::text('destination', '', [ 'class' => 'form-control', 'placeholder' => 'Destination'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('transport', 'Transport')}}
            {{Form::text('transport', '', [ 'class' => 'form-control', 'placeholder' => 'Transport'])}}
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-3">
            {{Form::label('shipping_address', 'Transport address')}}
            {{Form::text('shipping_address', '', [ 'class' => 'form-control', 'placeholder' => 'Transport address'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('address', 'Address')}}
            {{Form::textarea('address', '', [ 'class' => 'form-control', 'rows' => '3', 'placeholder' => 'Address'])}}
        </div>
    </div>
    <div class="form-group col-md-12 pl-0">
    {{Form::submit('Submit', ['class'=>'btn btn-dark'])}}
    </div>
    {!! Form::close() !!}

@endsection

