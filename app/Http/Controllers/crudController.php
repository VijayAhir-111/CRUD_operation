<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrudOperation;

class CrudController extends Controller
{
    // Display all students
    public function index()
    {
        $students = CrudOperation::all();
        return view('students.index', compact('students'));
    }

    // Show form to create student
    public function create()
    {
        return view('students.create');
    }

    // Store new student
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:crud_operation,email',
            'phone' => 'required|string|max:20',
        ]);

        CrudOperation::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $student = CrudOperation::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    // Update student
    public function update(Request $request, $id)
    {
        $student = CrudOperation::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:crud_operation,email,' . $student->id,
            'phone' => 'required|string|max:20',
            'grade' => 'required|string|max:10',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    // Delete student
    public function destroy($id)
    {
        $student = CrudOperation::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
