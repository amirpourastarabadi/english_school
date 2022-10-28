<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        return view('admin.students.index', ['students' => Student::all()]);
    }
    
    public function show(Student $student)
    {
        return view('admin.students.show', ['student' => $student, 'admin' => Admin::first()]);
    }
}
