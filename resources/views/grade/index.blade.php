@extends('dashboard')
@section('content')

<div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Grades Table</h6>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Grade</th>
                        <th>Date</th>
                        <th>Remarks</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($grades as $grade)
                            <tr>
                              <td>{{ $grade->student->name }}</td>
                              <td>{{ $grade->subject->subject }}</td>
                              <td>{{ $grade->grade }}</td>
                              <td>{{ $grade->date }}</td>
                              <td>{{ $grade->remarks }}</td>
                              <td>
                                  <!-- Edit Button -->
                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $grade->id }}">
                                      Edit
                                  </button>
                                  <!-- Modal -->
                                  <div class="modal fade" id="editModal{{ $grade->id }}" tabindex="-1" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                              <h5 class="modal-title">Edit Grade</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                              </div>
                                              <div class="modal-body">
                                                  <form id="editForm{{ $grade->id }}" action="{{ route('grade.update', ['id' => $grade->id]) }}" method="post">
                                                      @csrf
                                                      @method('PUT')
                                                      
                                                      <input type="text" name="student_id" value="{{ $grade->student_id }}">
                                                      <input type="text" name="subject_id" value="{{ $grade->subject_id }}">
                                                      
                                                      <div class="form-group">
                                                          <label for="">Grade:</label>
                                                          <input type="text" class="form-control opacity-75 mb-2" id="" name="grade" value="{{ $grade->grade }}" required>
                                                      </div>
                                  
                                                      <div class="form-group">
                                                          <label for="editDate{{ $grade->id }}">Date:</label>
                                                          <input type="date" class="form-control opacity-75 mb-2" id="editDate{{ $grade->id }}" name="date" value="{{ $grade->date }}" required>
                                                      </div>
                                  
                                                      <div class="form-group">
                                                          <label for="editRemarks{{ $grade->id }}">Remarks:</label>
                                                          <input type="text" class="form-control opacity-75 mb-2" id="editRemarks{{ $grade->id }}" name="remarks" value="{{ $grade->remarks }}" required>
                                                      </div>
                                  
                                                      <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                          <button type="submit" class="btn btn-primary">Save changes</button>
                                                      </div>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
    
                                    
                                    
                                    <!-- Delete Button -->
                                    <form action="{{ route('grade.destroy', ['id' => $grade->id]) }}" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Are you sure you want to delete the grade {{ $grade->grade }}')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
        </div>
    </div>

</div>

	

@endsection