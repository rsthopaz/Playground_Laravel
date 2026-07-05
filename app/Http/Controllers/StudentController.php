<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function index(){
        return view('dashboard.index');
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required|string|max:100',
            'reg_no'=>'required|string|max:100|unique:students,reg_no',
            'profile_image'=>'required|image|max:1024|mimes:png,jpg',

        ]);

        $imageName = time().'.'.$request->profile_image->extension();
        $request->profile_image->move(public_path('uploads/students'), $imageName);

        Student::create([
            'name'=>$request->name,
            'reg_no'=>$request->reg_no,
            'profile_image'=>$imageName,
        ]);

        return response()->json([
            'status'=>'success',
            'message'=>'student added succesfully'
        ]);
        
    }
}
