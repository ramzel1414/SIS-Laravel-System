<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    //method to display grades page
    public function index() {

        $grades = Grade::all(); // Fetch all students from the database
        return view('grade.index', ['grades' => $grades]);
    }

    // New method to update the edited grade
    public function update(Request $request, $id)
    {
        // Validate and update the student data
        $this->validate($request, [
            'grade' => 'required|string|max:255',
            'date' => 'required|date', // Use 'date' rule for a date field
            'remark' => 'required|string|max:255',
        ]);

        $grade = Grade::findOrFail($id);
        $grade->update([
            'grade' => $request->input('grade'),
            'date' => $request->input('date'),
            'remark' => $request->input('remark'),
            // Assuming you have 'student_id' and 'subject_id' in the grades table
            'student_id' => $request->input('student_id'),
            'subject_id' => $request->input('subject_id'),
        ]);

        return redirect()->route('grade.index')->with('success', 'Grade updated successfully');
    }




    // New method to delete a specific student
    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();

        return redirect()->route('grade.index')->with('success', 'Grade deleted successfully');
    }
}
