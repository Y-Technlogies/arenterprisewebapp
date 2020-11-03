@extends('mainlayouts.app')

@section('content')
        <h1>Create Invoice</h1>
        <invoice-table route="{{ route('invoice.store') }}"></invoice-table>
@endsection
