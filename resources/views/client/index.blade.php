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
                     <div class="text-center">
                            {!! $clients->links(); !!}  <!--pagination-->
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            
          
     {{-- Modal Form Show POST --}}

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
    $('#search').on('keyup', function(){
        var value = $(this).val();

        $.ajax({
          type: 'get',
          url : "{{ URL::to('search') }}",
          data:{
            search: value,
          },

          success:function{ data }{
            $('#initial_table').hide();
            $('#ajax').html(data);
          },

          error: function(jqXHR, textStatus, errorThrown){
              console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
          },

        });
    });
</script>
       


          </div>
        </div>
     </div>
    </div>
@endsection
