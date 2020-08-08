@extends('mainlayouts.app')

@section('content')
    <h1>Update or delete client</h1>
    <br>
    {!! Form::open([ 'action' => ['ClientController@update', $client->client_id], 'method' => 'USER', 'enctype' => 'multipart/form-data'])!!}

    <div class="form-row">
        <div class="form-group col-md-3">
            {{Form::label('clientsn', 'Client serial number')}}
            {{Form::text('clientsn', $client->clientsn, ['class' => 'form-control', 'placeholder'=>'Client serial number'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('companyname', 'Company name')}}
            {{Form::text('companyname', $client->companyname, ['class' => 'form-control', 'placeholder'=>'Company Name'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('propname', 'Proprietor Name')}}
            {{Form::text('propname', $client->propname, ['class' => 'form-control', 'placeholder'=>'Proprietor Name'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('propphone1', 'Proprietary Phone 1')}}
            {{Form::text('propphone1', $client->propphone1, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Proprietary Phone 1'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            {{Form::label('propphone2', 'Proprietary Phone 2')}}
            {{Form::text('propphone2', $client->propphone2, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Proprietary Phone 2'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('assistant', 'Assistant')}}
            {{Form::text('assistant', $client->assistant, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Assistant'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('asstphone1', 'Assistant Phone 1')}}
            {{Form::text('asstphone1', $client->asstphone1, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Assistant phone 1'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('asstphone2', 'Assistant Phone 2')}}
            {{Form::text('asstphone2', $client->asstphone2, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Assistant phone 2'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            {{Form::label('bussphone', 'Business Phone')}}
            {{Form::text('bussphone', $client->bussphone, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Business Phone'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('email', 'Client Email')}}
            {{Form::text('email', $client->email, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Client Email'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('destination', 'Destination')}}
            {{Form::text('destination', $client->destination, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Destination'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('transport', 'Transport')}}
            {{Form::text('transport', $client->transport, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Transport'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            {{Form::label('shipping_address', 'Shipping Address')}}
            {{Form::text('shipping_address', $client->shipping_address, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Shipping Address'])}}
        </div>
        <div class="form-group col-md-4">
            {{Form::label('address', 'Address')}}
            {{Form::textarea('address', $client->address, ['id' => 'article-ckeditor', 'class' => 'form-control', 'rows' => '3', 'placeholder' => 'Address'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-1">
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Update', ['class'=>'btn btn-dark'])}}
            {!! Form::close() !!}
        </div>
        <div class="col-md-1">
            {!!Form::open(['action' => ['ClientController@destroy', $client->id], 'method' => 'POST'])!!}
            {{Form::Hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        </div>

    </div>
    </div>

@endsection