<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;

class GradeController extends Controller
{
    //method to display grades page
    public function index() {

        $grades = Grade::all(); // Fetch all students from the database
        $students = Student::all(); // Fetch all students
        $subjects = Subject::all(); // Fetch all subjects
        return view('grade.index', ['grades' => $grades, 'students' => $students, 'subjects' => $subjects]);    //para ma display nato sila sa modal like add katung drop down didto
    }

    //method to create grade
    public function store(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'grade' => 'required|string|max:255',
            'date' => 'required|date',
            'remarks' => 'required|string|max:255',
        ]);

        // Create a new grade
        Grade::create([
            'student_id' => $request->input('student_id'),
            'subject_id' => $request->input('subject_id'),
            'grade' => $request->input('grade'),
            'date' => $request->input('date'),
            'remarks' => $request->input('remarks'),
        ]);


        //puwede japun 
        //$grade = new Grade([ <values> ]);
        //$grade->save()
        //gipili lang nako nang Grade::create kay one line ug wala lang,
        //ALSO CAREFUL FOR ATTRIBUT MISMATCH! (e.g. I've been doing this for hours and couldn't add a grade, Laravel also didn't throw an error,just redirects me back to grade.index like nothing happens, TURNS OUT, ANG "remarks" nga attribute sa database, kay "remark" akong nabutang kanag line 39 & 30 sa taas.
        


        //toaster notif when Added
        $notification = array ( 
            'message' => 'Grade Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('grade.index')->with($notification);
    }

    // New method to update the edited grade
    public function update(Request $request, $id)
    {
        // Validate and update the student data
        $this->validate($request, [
            'grade' => 'required|string|max:255',
            'date' => 'required|date', // Use 'date' rule for a date field
            'remarks' => 'required|string|max:255',
        ]);

        $grade = Grade::findOrFail($id);
        $grade->update([
            'grade' => $request->input('grade'),
            'date' => $request->input('date'),
            'remarks' => $request->input('remarks'),
            // Assuming you have 'student_id' and 'subject_id' in the grades table
            'student_id' => $request->input('student_id'),
            'subject_id' => $request->input('subject_id'),
        ]);

        //toaster notif when updated
        $notification = array ( 
            'message' => 'Grade UPdated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('grade.index')->with($notification);
    }




    // New method to delete a specific student
    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();

                //toaster notif when updated
        $notification = array ( 
            'message' => 'Grade Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('grade.index')->with($notification);
    }
}
