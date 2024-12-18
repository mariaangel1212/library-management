<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Student;
use App\Models\Book;
use App\Models\Books;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Tampilkan semua transaksi
    public function index()
    {
        $transactions = Transaction::with('student', 'book')->get();
        return view('transactions.index', compact('transactions'));
    }

    // Tampilkan form untuk menambahkan transaksi
    public function create()
    {
        $students = Student::all();
        $books = Books::all();
        return view('transactions.create', compact('students', 'books'));
    }

    // Simpan data transaksi ke database
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'book_id' => 'required',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date',
        ]);

        Transaction::create($request->all());
        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    // Tampilkan form edit transaksi
    public function edit(Transaction $transaction)
    {
        $students = Student::all();
        $books = Books::all();
        return view('transactions.edit', compact('transaction', 'students', 'books'));
    }

    // Update data transaksi
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'student_id' => 'required',
            'book_id' => 'required',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date',
        ]);

        $transaction->update($request->all());
        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    // Hapus data transaksi
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
