<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::orderBy('created_at', 'desc')->get();
        $totalThisMonth = Expense::getTotalThisMonth();
        $totalToday = Expense::getTotalToday();

        return view('expenses.index', compact('expenses', 'totalThisMonth', 'totalToday'));
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string|max:255',
            'date' => 'required|date'
        ]);

        Expense::create($request->all());

        return redirect()->route('expenses.index')->with('success', 'Pengeluaran berhasil ditambahkan!');
    }

    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string|max:255',
            'date' => 'required|date'
        ]);

        $expense->update($request->all());

        return redirect()->route('expenses.index')->with('success', 'Pengeluaran berhasil diperbarui!');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Pengeluaran berhasil dihapus!');
    }
}
