@extends('mainlayouts.app')

@section('content')
    <h1>Update or delete client</h1>
    <img style="width:20%" src="/public/agentimage/{{$agent->agentimage}}"> 
    <div></div>
    <br>
    {!! Form::open(['class' => 'form-inline', 'action' => ['AgentsController@update', $agent->agents_id], 'method' => 'USER', 'enctype' => 'multipart/form-data'])!!}
    <div class="form-group col-md-3">
        {{Form::label('agents_sn', 'Agent serial number')}}
        {{Form::text('agents_sn', $agent->agents_sn, ['class' => 'form-control', 'placeholder'=>'Agent serial number'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('agents_fname', 'First name')}}
        {{Form::text('agents_fname', $agent->agents_fname, ['class' => 'form-control', 'placeholder'=>'First name'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('agents_lname', 'Last name')}}
        {{Form::text('agents_lname', $agent->agents_lname, ['class' => 'form-control', 'placeholder'=>'Last name'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('agent_contact', 'Contact')}}
        {{Form::text('agent_contact', $agent->agent_contact, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Contact'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('agent_email', 'Email (optional)')}}
        {{Form::text('agent_email', $agent->agent_email, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Email'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('salesdivision', 'Sales division')}}
        {{Form::text('salesdivision', $agent->salesdivision, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Sales division'])}}
    </div>
    <div class="form-group col-md-4">
        {{Form::label('agentaddress', 'Address')}}
        {{Form::textarea('agentaddress', $agent->agentaddress, ['id' => 'article-ckeditor', 'class' => 'form-control', 'rows' => '3', 'placeholder' => 'Address'])}}
    </div>
    <div class="form-group col-md-5">
        {{Form::file('nid')}}
    </div>
    <div class="col-sm-offset-2 col-sm-10">
        {{Form::Hidden('_method', 'PUT')}}
        {{Form::submit('Update', ['class'=>'btn btn-dark'])}}
        {!! Form::close() !!}
    </div>
 @endsection