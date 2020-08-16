<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Product;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function create()
    {
        $agents = Agent::all();
        $products = Product::pluck('name', 'id');
        return view('invoice.create')->with(compact('agents', 'products'));
    }
    public function exportPdf(Request $request)
    {
        dd($request->input());
//        $pdf = PDF::loadView('invoice.pdf', $request->input());
//        return $pdf->stream('invoice.pdf');
    }

    public function show()
    {
        return view('invoice.pdf');
    }
}
