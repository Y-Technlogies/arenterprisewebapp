@extends('mainlayouts.app')

@section('content')
    <h1>Create Invoice</h1>
    {!! Form::open(['action' => 'InvoiceController@exportPdf', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    <div class="form-row">
        <div class="form-group col-md-3">
            {{Form::label('invoiceno', 'Invoice number')}}
            {{Form::text('agents_sn', '', ['class' => 'form-control', 'placeholder' => 'Invoice number'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('invoicetitle', 'Invoice Title')}}
            {{Form::text('invoicetitle', '', ['class' => 'form-control', 'placeholder'=>'Title'])}}
        </div>
        <div class="form-group col-md-3" >
            {{Form::label('clientname', 'Client Serial')}}
            {{Form::text('clientname', '', ['class' => 'form-control', 'placeholder' => 'Client Name'])}}
        </div>
       <div class="form-group col-md-3" >
            {{Form::label('clientname', 'Client Name')}}
            {{Form::text('clientname', '', ['class' => 'form-control', 'placeholder' => 'Client Name'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            {{Form::label('clientaddress', 'Client Address')}}
            {{Form::textarea('clientaddress', '', ['class' => 'form-control', 'placeholder' => 'Client Address'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('agent_name', 'Agent Name')}}
            <select name="agent_name" class="form-control">
                <option value="0">Select Agent</option>
                @foreach($agents as $agent)
                    <option value="{{ $agent->agent_id }}">{{ $agent->full_name() }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3">
            {{Form::label('clientaddress', 'Destination')}}
            {{Form::textarea('clientaddress', '', ['class' => 'form-control', 'placeholder' => 'Client Address'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('salesdivision', 'Sales Division')}}
            {{Form::text('salesdivision', '', ['class' => 'form-control', 'placeholder' => 'Sales Division'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            {{Form::label('invoicedate', 'Invoice Date')}}
            {{Form::text('invoicedate', '', ['class' => 'form-control', 'placeholder' => 'Invoice Date'])}}
        </div>
        <div class="form-group col-md-3">
            {{Form::label('duedate', 'Due Date')}}
            {{Form::text('duedate', '', ['class' => 'form-control', 'placeholder' => 'Due Date'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12">
            <invoice-table></invoice-table>
        </div>
    </div>
    <div class="form-group col-md-3 pl-0">
    {{Form::submit('Submit', ['class'=>'btn btn-dark'])}}
    {!! Form::close() !!}
    </div>
@endsection

