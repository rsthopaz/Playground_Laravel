<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    //
    public function index(){
        $students = Student::latest()->get();
        return view('dashboard.index', compact('students'));
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

    public function fetch(){
        $students = Student::latest()->get();
        return view('dashboard.student-data', compact('students'))->render();
    }

    public function update(Request $request){

        $student = Student::findOrFail($request->id);


        $request->validate([
            'name'=>'required|string|max:100',
            'reg_no'=>'required|string|max:100|unique:students,reg_no, ' .$student->id,
            'profile_image'=>'nullable|image|max:1024|mimes:png,jpg',

        ]);

        $imageName = $student->profile_image;

        // $imageName = time().'.'.$request->profile_image->extension();
        // $request->profile_image->move(public_path('uploads/students'), $imageName);

        if($request->hasFile('profile_image')){
            $old_path=public_path('uploads/students/' .$student->profile_image);
            if(File::exists($old_path)){
                File::delete($old_path);
            }
            $imageName = time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('uploads/students'), $imageName);
        }


        $student->update([
            'name'=>$request->name,
            'reg_no'=>$request->reg_no,
            'profile_image'=>$imageName,
        ]);

        return response()->json([
            'status'=>'success',
            'message'=>'student updated succesfully'
        ]);
        
    }

    public function delete(Request $request){   

    $student = Student::findOrFail($request->id);

    if($request->profile_image){
            $old_path=public_path('uploads/students/' .$student->profile_image);
            if(File::exists($old_path)){
                File::delete($old_path);
            }
            $imageName = time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('uploads/students'), $imageName);
        }

        $student->delete();

        return response()->json([
            'status'=>'success',
            'message'=>'student deleted succesfully'
        ]);

    }

    public function search(Request $request){
        $search = $request->search;

        $students = Student::where(function($query) use ($search){
        $query->where('name', 'LIKE', "%{$search}%")
        ->orWhere('reg_no', 'LIKE', "%{$search}%");
        })->latest()->get();

        return view ('dashboard.student-data', compact('students'))->render();
    }
}
