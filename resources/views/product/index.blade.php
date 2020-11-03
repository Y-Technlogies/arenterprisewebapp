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
                        <h3>Manage Products</h3>
                        <div><a href="{{ route('product.create') }}" class="show-modal create-modal btn btn-primary">New Product</a></div>
                        <br>

                        <table class="table table-striped table-hover" id="ProductTable">
                            <thead>
                            <tr>
                                <th>Serial No.</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody id="initial_table">
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->product_serial}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->type}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->stock}}</td>
                                    <td>
                                        <span>
                                    <a href="{{ route('product.edit', $product->id) }}" class="fa fa-eye show-modal btn btn-info"></a></span></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
