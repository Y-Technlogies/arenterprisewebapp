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
                        <div><a href="/agents/create" class="show-modal create-modal btn btn-primary">New Agent</a></div>
                        <br>

                        <form action="/search" method="GET">
                            <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control col-md-6" placeholder="Search using Client ID">
                        <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">Search</button>
                        </span>
                    </div>
                </form>
                        <br>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Agent ID</th>
                                <th>Name</th>
                                <th>Phone</th> 
                                <th>Sales Division</th>
                                <th></th>
                                <th></th>
                            </tr>    
                        </thead>

                        <tbody id="initial_table">
                            @foreach($agents as $agent)
                            <tr>
                                <td>{{$agent->agents_sn}}</td>
                                <td>{{$agent->agents_fname}} {{$agent->agents_lname}}</td>
                                <td>{{$agent->agent_contact}}</td>
                                <td>{{$agent->salesdivision}}</td>
                                <td><span style="display:flex; justify-content:flex-end; width:190%; padding:0;"> 
                                    <a href="/agents/{{$agent->agents_id}}/edit" class="fa fa-eye show-modal btn btn-info"></a></span></td> 
                                    <td></td>
                                    <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $agents->links(); !!}
                    </div>
          </div>
        </div>
     </div>
    </div>
@endsection
