@extends('mainlayouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Welcome, {{Auth::user()->username}}</div>
               <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        <div class="col-md-4 col-xs-6">
                    <img src="storage/dashboard_img/pls.png" style="width:30%">
                        </div>
                    @endif
                    <div class="text-center">
                    <td><img src="storage/dashboard_img/pls.png" class="ml-3"></td></div>
                    <br>
                    <div class="btn-group dropup">
                    <a href="/client" class="btn btn-primary ml-4 float-center">Manage Clients</a>
                    <a href="/agents" class="btn btn-primary ml-2 float-center">Manage Agents</a>
                    <a href="/posts/create" class="btn btn-primary ml-2 float-center">Products</a>
                    <a href="/invoices/create" class="btn btn-primary ml-2 float-center">Manage Invoice</a>
                    <a href="/posts/create" class="btn btn-primary ml-2 float-center">Manage Bills</a>
                    </div>
               </div>
            </div>
        </div>
    </div>

    
@endsection
