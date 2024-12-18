<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
   // Tampilkan semua siswa
   public function index()
   {
       $students = Student::all();
       return view('students.index', compact('students'));
   }

   // Tampilkan form untuk menambahkan siswa
   public function create()
   {
       return view('students.create');
   }

   // Simpan data siswa ke database
   public function store(Request $request)
   {
       $request->validate([
           'name' => 'required',
           'class' => 'required',
           'contact' => 'required',
       ]);

       Student::create($request->all());
       return redirect()->route('students.index')->with('success', 'Student created successfully.');
   }

   // Tampilkan form edit siswa
   public function edit(Student $student)
   {
       return view('students.edit', compact('student'));
   }

   // Update data siswa
   public function update(Request $request, Student $student)
   {
       $request->validate([
           'name' => 'required',
           'class' => 'required',
           'contact' => 'required',
       ]);

       $student->update($request->all());
       return redirect()->route('students.index')->with('success', 'Student updated successfully.');
   }

   // Hapus data siswa
   public function destroy(Student $student)
   {
       $student->delete();
       return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
   }
}
