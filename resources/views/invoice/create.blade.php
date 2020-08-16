@extends('mainlayouts.app')

@section('content')
        <h1>Create Invoice</h1>
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
                        2010
                    </b>
                </td>
                <td colspan="2">
                    Date <br>
                    <b>
                        12-Mar-2021
                    </b>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Delivery Note: <br>

                </td>
                <td colspan="2">Mode/Term of payment: <br>
                    <b>
                        Cradit
                    </b>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Aggent: <br>
                    <b>Md. Main Uddin</b>
                </td>
                <td colspan="2">Client <br></td>
            </tr>
            <tr>
                <td colspan="2">Buyer's order No: <br></td>
                <td colspan="2">Date <br></td>
            </tr>
            <tr>
                <td colspan="3" rowspan="3">Buyer: <br></td>
                <td colspan="2">Dispatch Document No: <br></td>
                <td colspan="2">Date</td>
            </tr>
            <tr>
                <td colspan="2">Address <br></td>
                <td colspan="2">Destination <br></td>
            </tr>
            <tr>
                <td colspan="4" rowspan="2">Terms of Delivery: <br></td>
            </tr>
            <tr>
                <td colspan="3">28<br></td>
            </tr>
            <tr>
                <td colspan="3" class="text-center">Description of Gods</td>
                <td>Quantity/Cat</td>
                <td>Rate/Cat</td>
                <td colspan="2">Amount</td>
            </tr>
            <tr>
                <td style="border: 0; width: 1%">
                    <a href="#" class="btn btn-info"><i class="fa fa-plus"></i></a>
                </td>
                <td colspan="3">20</td>
                <td>21</td>
                <td>22</td>
                <td colspan="2">23</td>
            </tr>
            <tr>
                <td style="border: 0;"></td>
                <td colspan="3" class="text-right">Total</td>
                <td>25</td>
                <td>26</td>
                <td colspan="2">27</td>
            </tr>
            </tbody>
        </table>
@endsection

<style>
    td {
        border : 1px solid #dee2e6;
    }
</style>
