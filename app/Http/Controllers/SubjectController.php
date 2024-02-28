<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;


class SubjectController extends Controller
{
    public function index() {
        
        $subjects = Subject::all();
        return view('subject.index', ['subjects' => $subjects]);
    }

    // New method to add a student
    public function store(Request $request) {

        // Validate the subject data
        $this->validate($request, [
            'subject' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'credits' => 'required|integer|min:1',
            'semester' => 'required|string|max:255',
        ]);

        // Create a new student
        $subject = new Subject();
        $subject->subject = $request->input('subject');
        $subject->description = $request->input('description');
        $subject->code = $request->input('code');
        $subject->credits = $request->input('credits');
        $subject->semester = $request->input('semester');
        $subject->save();

        return redirect()->route('subject.index')->with('success', 'Subject added successfully');
    }

    
    // New method to update the edited student
    public function update(Request $request, $id)
    {
        // Validate and update the student data
        $this->validate($request, [
            'subject' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'credits' => 'required|integer|min:1',
            'semester' => 'required|string|max:255',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update($request->all());
        
        return redirect()->route('subject.index')->with('success', 'Subject updated successfully');
    }
    
    // New method to delete a specific subject
    public function destroy($id)
    {
        $subject = subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('subject.index')->with('success', 'Subject deleted successfully');
    }

}
