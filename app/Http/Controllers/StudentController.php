<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all(); // Fetch all students from the database
        return view('student.index', ['students' => $students]);
    }

    // New method to add a student
    public function store(Request $request) {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->route('student.index')->withErrors($validator)->withInput();
        }

        // Create a new student
        $student = new Student();
        $student->name = $request->input('name');
        $student->address = $request->input('address');
        $student->age = $request->input('age');
        $student->save();

        //toaster notif when added
        $notification = array ( 
            'message' => 'Student Added Successfully',
            'alert-type' => 'success',
        );


        return redirect()->route('student.index')->with($notification);
    }

    // New method to update the edited student
    public function update(Request $request, $id)
    {
        // Validate and update the student data
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        
        //toaster notif when update
        $notification = array ( 
            'message' => 'Student Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.index')->with($notification);
    }

    // New method to delete a specific student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        
        //toaster notif when deleted
        $notification = array ( 
            'message' => 'Student Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.index')->with($notification);
    }
}

//In this Controller, I used 2 forms of validation:
//1. $this->validate(): (from editing student) and;
//2. Validator Facade: (from adding student);
//I can use either only one of them for both function but I tried to use both to show you that there are several types of validators and these 2 are some examples, especially when put and post method is involved. Their difference is that #1 is simple and readable but limited control in errors handing, #2 is more code but more control over validation, it also requires this use Illuminate\Support\Facades\Validator;
