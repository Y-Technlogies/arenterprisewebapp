@extends('mainlayouts.app')

@section('content')
    <h1>Create Agent</h1>
    {!! Form::open(['action' => 'AgentsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    <div class="form-row">
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
    </div>
    <div class="form-row">
        <div class="form-group col-md-3" >
            {{Form::label('agent_email', 'Email (Optional)')}}
            {{Form::text('agent_email', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Email (Optional)'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('salesdivision', 'Sales Division')}}
            {{Form::text('salesdivision', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Sales Division'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('agentaddress', 'Address')}}
            {{Form::textarea('agentaddress', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'rows' => '3', 'placeholder' => 'Address'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('Upload agent ID')}}
            {{Form::file('agentimage')}}
        </div>
    </div>
    <div class="col-md-12 pl-0">
    {{Form::submit('Submit', ['class'=>'btn btn-dark'])}}
    </div>
    {!! Form::close() !!}
@endsection

