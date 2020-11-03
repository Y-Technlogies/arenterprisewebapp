@extends('mainlayouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                <div class="card-header">Welcome, {{Auth::user()->username}}</div>
                   <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3>Manage Clients</h3>
                        <div><a href="/client/create" class="show-modal create-modal btn btn-primary">New Client</a></div>
                        <br>

                        <table class="table table-striped table-hover" id="ClientTable">
                          <thead>  
                             <tr>
                                <th>Serial No.</th>
                                <th>Proprietor</th>
                                <th>Company Name</th>
                                <th>Location</th> 
                                <th>Phone</th>
                                <th>Assistant Name</th>
                                <th>Assistant Phone</th>
                                <th></th>
                                <th></th>
                            </tr>
                          </thead>

                            <tbody id="initial_table">
                            @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->clientsn}}</td>
                                    <td>{{$client->propname}}</td>
                                    <td>{{$client->companyname}}</td>
                                    <td>{{$client->destination}}</td>
                                    <td>{{$client->propphone1}}</td>
                                    <td>{{$client->assistant}}</td>
                                    <td>{{$client->asstphone1}}</td>
                                    <td><span style="display:flex; justify-content:flex-end; width:190%; padding:0;">
                                    <a href="/client/{{$client->client_id}}/edit" class="fa fa-eye show-modal btn btn-info"></a></span></td>
                                    <td></td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
                </div>
              </div>
          </div>
        </div>
     </div>
    </div>
@endsection
