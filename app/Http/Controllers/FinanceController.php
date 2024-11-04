<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finance; // import the Finance model

class FinanceController extends Controller
{
    /**
     * Display a listing of the finances.
     */
    public function index()
    {
        $finances = Finance::all(); // fetch all records
        return view('finances.index', compact('finances'));
    }

    /**
     * Show the form for creating a new finance record.
     */
    public function create()
    {
        return view('finances.create'); // points to create.blade.php
    }

    /**
     * Store a newly created finance record in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'type' => 'required|in:pemasukan,pengeluaran'
        ]);

        Finance::create($request->all()); // saves the data

        return redirect()->route('finances.index')->with('success', 'Record created successfully!');
    }

    /**
     * Display the specified finance record.
     */
    public function show($id)
    {
        $finance = Finance::findOrFail($id); // fetches the specific record by ID
        return view('finances.show', compact('finance'));
    }

    /**
     * Show the form for editing a finance record.
     */
    public function edit($id)
    {
        $finance = Finance::findOrFail($id); // fetches the record to edit
        return view('finances.edit', compact('finance'));
    }

    /**
     * Update the specified finance record in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'type' => 'required|in:pemasukan,pengeluaran'
        ]);

        $finance = Finance::findOrFail($id);
        $finance->update($request->all()); // updates the record

        return redirect()->route('finances.index')->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified finance record from storage.
     */
    public function destroy($id)
    {
        $finance = Finance::findOrFail($id);
        $finance->delete(); // deletes the record

        return redirect()->route('finances.index')->with('success', 'Record deleted successfully!');
    }

    /**
     * Display the monthly report.
     */
    public function monthlyReport(Request $request)
{
    // get the selected month and year, default to the current month and year if not set
    $month = $request->input('month', date('m'));
    $year = $request->input('year', date('Y'));

    // filter income and expense records by the selected month and year
    $totalIncome = Finance::where('type', 'pemasukan')
        ->whereYear('date', $year)
        ->whereMonth('date', $month)
        ->sum('amount');

    $totalExpense = Finance::where('type', 'pengeluaran')
        ->whereYear('date', $year)
        ->whereMonth('date', $month)
        ->sum('amount');

    // pass data to the view, along with the selected month and year
    return view('finances.report', compact('totalIncome', 'totalExpense'));
}

}
