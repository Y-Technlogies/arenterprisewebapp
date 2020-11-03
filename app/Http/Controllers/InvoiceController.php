<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Invoice;
use App\Product;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{


    /**
     * InvoiceController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $agents = Agent::all();
        $products = Product::pluck('name', 'id');
        return view('invoice.create')->with(compact('agents', 'products'));
    }

    public function store(Request $request)
    {
        $tmpInvocie = $request->get('invoice');
        $invoice = new Invoice();
        $invoice->client_id = $tmpInvocie["clientId"];
        $invoice->agent_id = $tmpInvocie["agentId"];
        $invoice->delivery_note = $tmpInvocie["delivery_note"];
        $invoice->amount = $tmpInvocie["totalAmount"];
        $invoice->quantity = $tmpInvocie["totalQuantity"];
        $invoice->invoice_no = $tmpInvocie["invoice_no"];
        $invoice->discount = $tmpInvocie["discount"];
        $invoice->save();

        $tmpProduct = $request->get('product');

        foreach ($tmpProduct as $product) {
            $invoice->products()->attach($product['id'], ['quantity' => $product['quantity']]);
        }

        return response()->json(['url' => route('invoice.show', $invoice->id)]);

    }

    public function exportPdf($id)
    {
        $invoice = Invoice::find($id);
        $pdf = PDF::loadView('invoice.pdf', compact('invoice'));
        return $pdf->stream('invoice.pdf');
    }

    public function show($id)
    {
        $invoice = Invoice::find($id);
        return view('invoice.view')->with(compact('invoice'));
    }
}
