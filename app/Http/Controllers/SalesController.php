<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\JournalEntry;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::orderBy('date','desc')->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        return redirect()->route('sales.index'); 
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'customer_name' => 'required|string|max:255',
            'item' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'rate' => 'required|numeric|min:0',
        ]);

        $data['total_amount'] = round($data['quantity'] * $data['rate'], 2);

        $sale = Sale::create($data);

        JournalEntry::create([
            'date' => $sale->date,
            'description' => "Sale to {$sale->customer_name} - {$sale->item}",
            'debit_account' => 'Accounts Receivable',
            'credit_account' => 'Sales Revenue',
            'amount' => $sale->total_amount,
        ]);

        return redirect()->route('sales.index')->with('success', 'Sale recorded and journal entry created.');
    }

    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        return view('sales.edit', compact('sale'));
    }

    public function update(Request $request, Sale $sale)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'customer_name' => 'required|string|max:255',
            'item' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'rate' => 'required|numeric|min:0',
        ]);

        $data['total_amount'] = round($data['quantity'] * $data['rate'], 2);
        $sale->update($data);
        return redirect()->route('sales.index')->with('success', 'Sale updated.');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Sale deleted.');
    }
}
