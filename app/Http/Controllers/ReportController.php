<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function loanReport(Request $request)
    {
        $transactions = Transaction::with('student', 'book');

        if ($request->has('student_name')) {
            $transactions->whereHas('student', function ($query) use ($request) {
                $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($request->student_name) . '%']);
            });            
        }

        $transactions = $transactions->get();
        return view('reports.loans', compact('transactions'));
    }

    public function studentReport(Request $request)
    {
        $students = Student::query();

        if ($request->has('name')) {
            $students->where('name', 'like', '%' . $request->name . '%');
        }

        $students = $students->get();
        return view('reports.students', compact('students'));
    }
}
