<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Invoice</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style>

    .receipt-content {
        margin-top: -10px;
    }

    .receipt-content .logo a:hover {
        text-decoration: none;
        color: #7793C4;
    }

    .receipt-content .invoice-wrapper {
        background: #FFF;
        border: 1px solid #CDD3E2;
        box-shadow: 0px 0px 1px #CCC;
        border-radius: 4px;
    }

    .receipt-content .invoice-wrapper .payment-details span {
        color: #A9B0BB;
        display: block;
    }
    .receipt-content .invoice-wrapper .payment-details a {
        display: inline-block;
        margin-top: 5px;
    }

    .receipt-content .invoice-wrapper .line-items .print a {
        display: inline-block;
        border: 1px solid #9CB5D6;
        padding: 13px 13px;
        border-radius: 5px;
        color: #708DC0;
        font-size: 13px;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -ms-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
        transition: all 0.2s linear;
    }

    .receipt-content .invoice-wrapper .line-items .print a:hover {
        text-decoration: none;
        border-color: #333;
        color: #333;
    }

    .receipt-content {
        background: #ECEEF4;
    }
    @media (min-width: 1200px) {
        .receipt-content .container {width: 900px; }
    }

    .receipt-content .logo {
        text-align: center;
        margin-top: 20px;
    }

    .receipt-content .logo a {
        font-family: Myriad Pro, Lato, Helvetica Neue, Arial;
        font-size: 36px;
        letter-spacing: .1px;
        color: #555;
        font-weight: 300;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -ms-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
        transition: all 0.2s linear;
    }

    .receipt-content .invoice-wrapper .intro {
        line-height: 25px;
        color: #444;
    }

    .receipt-content .invoice-wrapper .payment-info {
        margin-top: 25px;
        padding-top: 15px;
    }

    .receipt-content .invoice-wrapper .payment-info span {
        color: #A9B0BB;
    }

    .receipt-content .invoice-wrapper .payment-info strong {
        display: block;
        color: #444;
        margin-top: 3px;
    }

    @media (max-width: 767px) {
        .receipt-content .invoice-wrapper .payment-info .text-right {
            text-align: left;
            margin-top: 20px; }
    }
    .receipt-content .invoice-wrapper .payment-details {
        border-top: 2px solid #EBECEE;
        margin-top: 30px;
        padding-top: 20px;
        line-height: 22px;
    }


    @media (max-width: 767px) {
        .receipt-content .invoice-wrapper .payment-details .text-right {
            text-align: left;
            margin-top: 20px; }
    }
    .receipt-content .invoice-wrapper .line-items {
        margin-top: 40px;
    }
    .receipt-content .invoice-wrapper .line-items .headers {
        color: #A9B0BB;
        font-size: 13px;
        letter-spacing: .3px;
        border-bottom: 2px solid #EBECEE;
        padding-bottom: 4px;
    }
    .receipt-content .invoice-wrapper .line-items .items {
        margin-top: 8px;
        border-bottom: 2px solid #EBECEE;
        padding-bottom: 8px;
    }
    .receipt-content .invoice-wrapper .line-items .items .item {
        padding: 10px 0;
        color: #696969;
        font-size: 15px;
    }
    @media (max-width: 767px) {
        .receipt-content .invoice-wrapper .line-items .items .item {
            font-size: 13px; }
    }
    .receipt-content .invoice-wrapper .line-items .items .item .amount {
        letter-spacing: 0.1px;
        color: #84868A;
        font-size: 16px;
    }
    @media (max-width: 767px) {
        .receipt-content .invoice-wrapper .line-items .items .item .amount {
            font-size: 13px; }
    }

    .receipt-content .invoice-wrapper .line-items .total {
        margin-top: 30px;
    }

    .receipt-content .invoice-wrapper .line-items .total .extra-notes {
        float: left;
        width: 40%;
        text-align: left;
        font-size: 13px;
        color: #7A7A7A;
        line-height: 20px;
    }

    @media (max-width: 767px) {
        .receipt-content .invoice-wrapper .line-items .total .extra-notes {
            width: 100%;
            margin-bottom: 30px;
            float: none; }
    }

    .receipt-content .invoice-wrapper .line-items .total .extra-notes strong {
        display: block;
        margin-bottom: 5px;
        color: #454545;
    }

    .receipt-content .invoice-wrapper .line-items .total .field {
        margin-bottom: 7px;
        font-size: 14px;
        color: #555;
    }

    .receipt-content .invoice-wrapper .line-items .total .field.grand-total {
        margin-top: 10px;
        font-size: 16px;
        font-weight: 500;
    }

    .receipt-content .invoice-wrapper .line-items .total .field.grand-total span {
        color: #20A720;
        font-size: 16px;
    }

    .receipt-content .invoice-wrapper .line-items .total .field span {
        display: inline-block;
        margin-left: 20px;
        min-width: 85px;
        color: #84868A;
        font-size: 15px;
    }

    .receipt-content .invoice-wrapper .line-items .print {
        margin-top: 50px;
        text-align: center;
    }



    .receipt-content .invoice-wrapper .line-items .print a i {
        margin-right: 3px;
        font-size: 14px;
    }

    .receipt-content .footer {
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: center;
        font-size: 12px;
        color: #969CAD;
    }

    .absolute-center h1 {
        z-index: 9999;
        opacity: 0.2;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        page-break-inside: avoid !important;
        border: 1px solid #dee2e6;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
        border-left: 1px solid #dee2e6;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    .table tbody + tbody {
        border-top: 2px solid #dee2e6;
        /*border-bottom: 2px solid #dee2e6;*/
    }

</style>
<body>
<div class="receipt-content">
    <div class="logo">
        <img width="350" src="{{ asset('storage/pdf/pdf.png') }}" alt="pdf logo">
    </div>
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-md-12">
                <div class="invoice-wrapper">
                    <div class="tg-wrap">
                        <table class="table">
                            <tbody>
                            <tr style="border: 0;">
                                <td colspan="4" rowspan="4" width="50%"
                                    style="padding-left: 10px;">
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
                            <tr style="margin-bottom: 10px;">
                                <td colspan="2">
                                    Agent: <br>
                                    {{ $invoice->agents->full_name() }}
                                    <br>
                                </td>
                                <td colspan="2">Client <br>
                                    {{ $invoice->clients->prop_name }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">Buyer's order No: &nbsp;<br></td>
                                <td colspan="2">Date: &nbsp; <br></td>
                            </tr>
                            <tr>
                                <td colspan="4" rowspan="3"
                                    style="padding-left: 10px;">
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
                                <td colspan="4" style="padding-left: 10px;">
                                    Discount given in %
                                    {{ $invoice->discount }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: center;">Description of Goods</td>
                                <td>Quantity/Cat</td>
                                <td>Rate/Cat</td>
                                <td colspan="2">Amount</td>
                            </tr>

                            @foreach($invoice->products as $product)
                                <tr>
                                    <td colspan="4" style="text-align: center;">
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
                                <td colspan="4" style="text-align: right;">Total</td>
                                <td>{{ $invoice->quality }}</td>
                                <td></td>
                                <td colspan="2">{{ $invoice->amount }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="footer">
                    Copyright © 2014. company name
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>