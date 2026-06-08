<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    public function index()
{
    $students = Student::orderBy('matric_id','asc')->get();
    return view('students',compact('students'));
}

    public function store (Request $request)
{

    $student = new Student();
    $student->matric_id=$request->matric_id;
    $student->first_name=$request->first_name;
    $student->last_name=$request->last_name;
    $student->email=$request->email;
    $student->phone_no=$request->phone_no;
    $student->created_at=today();
    $student->updated_at=today();
    $student->save();
    return redirect('/students');
}

  
}
