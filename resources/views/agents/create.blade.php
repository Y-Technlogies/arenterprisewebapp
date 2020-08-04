@extends('mainlayouts.app')

@section('content')
    <h1>Create Agent</h1>
    {!! Form::open(['class' => 'form-inline', 'action' => 'AgentsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    <div class="form-group col-md-3">
        {{Form::label('agents_sn', 'Agent serial number')}}
        {{Form::text('agents_sn', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Agent serial number'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('agents_fname', 'First Name')}}
        {{Form::text('agents_fname', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'First Name'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('agents_lname', 'Last Name')}}
        {{Form::text('agents_lname', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder'=>'Last name'])}}
    </div>
   <div class="form-group col-md-3" >
        {{Form::label('agent_contact', 'Contact')}}
        {{Form::text('agent_contact', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Contact'])}}
    </div>
    <div class="form-group col-md-3" >
        {{Form::label('agent_email', 'Email (Optional)')}}
        {{Form::text('agent_email', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Email (Optional)'])}}
    </div>
    <div class="form-group col-md-3">
        {{Form::label('salesdivision', 'Sales Division')}}
        {{Form::text('salesdivision', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Sales Division'])}}
    </div>
    <div class="form-group col-md-4">
        {{Form::label('agentaddress', 'Address')}}
        {{Form::textarea('agentaddress', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'rows' => '3', 'placeholder' => 'Address'])}}
    </div>
    <div class="form-group col-md-4">
        {{Form::label('Upload agent ID')}}
        {{Form::file('agentimage')}}
    </div>
    <div class="col-sm-offset-2 col-sm-10">
    {{Form::submit('Submit', ['class'=>'btn btn-dark'])}}
    {!! Form::close() !!}
    </div>
@endsection

