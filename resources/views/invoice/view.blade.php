@extends('mainlayouts.app')

@section('content')
    <table class="table">
        <tbody>
        <tr>
            <td rowspan="9" style="border: 0;"></td>
            <td colspan="3" rowspan="4" width="50%">
                A.R Enterprice <br>
                191 K Y Plaza(4th floor) <br>
                Fokira Pool, Motijheel C/A <br>
                Dhaka-1000 <br>
                Phone:02-7191365 <br>
                Mobile: 01716-511288, 01705-478851 <br>
                Email: arenterprisebd2012@gmail.com, powerlube12@gmail.com

            </td>
            <td colspan="2">
                Invoice No <br>
                <b>
                    {{ $invoice->invoice_no }}
                </b>
            </td>
            <td colspan="2">
                Date <br>
                <b>
                    {{ date('m/d/Y', strtotime($invoice->created_at)) }}
                </b>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Delivery Note: <br>
                <p>{{ $invoice->delivery_note }}</p>
            </td>
            <td colspan="2">Mode/Term of payment: <br>
                <b>
                    Cradit
                </b>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Agent: <br>
                {{ $invoice->agents->full_name() }}
            </td>
            <td colspan="2">Client <br>
                {{ $invoice->clients->prop_name }}
            </td>
        </tr>
        <tr>
            <td colspan="2">Buyer's order No: <br></td>
            <td colspan="2">Date <br></td>
        </tr>
        <tr>
            <td colspan="3" rowspan="3">
                Buyer: <br>
                {{ $invoice->clients->companyname }} <br>
                {{ $invoice->clients->propname }} <br>
                {{ $invoice->clients->address }} <br>
                {{ $invoice->clients->propphone1 }}, {{  $invoice->clients->propphone2 }}<br>
                {{ $invoice->clients->transport }}
            </td>
            <td colspan="2">Dispatch Document No: <br></td>
            <td colspan="2">Date</td>
        </tr>
        <tr>
            <td colspan="2">Address <br></td>
            <td colspan="2">Destination <br>
                {{  $invoice->clients->destination }}
            </td>
        </tr>
        <tr>
            <td colspan="4" rowspan="2">Terms of Delivery: <br>
                {{ $invoice->delivery_note }}
            </td>
        </tr>
        <tr>
            <td colspan="3">
                Discount given in %
                {{ $invoice->discount }}
            </td>
        </tr>
        <tr>
            <td colspan="3" class="text-center">Description of Gods</td>
            <td>Quantity/Cat</td>
            <td>Rate/Cat</td>
            <td colspan="2">Amount</td>
        </tr>

        @foreach($invoice->products as $product)
            <tr>
                <td style="border: 0;"></td>
                <td colspan="3" class="text-center">
                    {{ $product->name }}
                </td>
                <td>
                    {{ $product->pivot->quantity }}
                </td>
                <td>{{ $product->price }}</td>
                <td colspan="2">{{ $product->pivot->quantity * $product->price }}</td>
            </tr>
        @endforeach

        <tr>
            <td style="border: 0;"></td>
            <td colspan="3" class="text-right">Total</td>
            <td>{{ $invoice->quality }}</td>
            <td></td>
            <td colspan="2">{{ $invoice->amount }}</td>
        </tr>
        <tr>
            <td style="border: 0;" colspan="7"></td>
            <td style="border: 0;" class="text-right">
                <a href="{{ url('/invoice/export', $invoice->id) }}" class="btn btn-danger">Print</a>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
