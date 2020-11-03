@extends('mainlayouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                   <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3>Manage Agents</h3>
                        <div class="pb-3"><a href="/agents/create" class="show-modal create-modal btn btn-primary">New Agent</a></div>
                        <table class="table table-striped table-hover" id="AgentTable">
                            <thead>
                            <tr>
                                <th>Agent ID</th>
                                <th>Name</th>
                                <th>Phone</th> 
                                <th>Sales Division</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody id="initial_table">
                               @foreach($agents as $agent)
                                    <tr>
                                       <td>{{$agent->agents_sn}}</td>
                                       <td>{{$agent->agents_fname}} {{$agent->agents_lname}}</td>
                                       <td>{{$agent->agent_contact}}</td>
                                       <td>{{$agent->salesdivision}}</td>
                                        <td>
                                        <span>
                                            <a href="/agents/{{$agent->agents_id}}/edit" class="fa fa-eye show-modal btn btn-info"></a>
                                        </span>
                                        </td>
                                    </tr>
                               @endforeach
                        </tbody>
                    </table>
          </div>
        </div>
     </div>
    </div>
@endsection
