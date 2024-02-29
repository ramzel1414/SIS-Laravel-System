@extends('dashboard')
@section('content')

<div class="page-content">

        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between my-2">
                <h6 class="card-title">Subjects Table</h6>                                   
                <!-- Add Student Button -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSubjectModal">
                    Add Subject
                </button>
              </div>

            <!-- Add sUBJECT Modal -->
            <div class="modal fade" id="addSubjectModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Subject</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addSubjectForm" action="{{ route('subject.store') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="addSubject">Subject:</label>
                                    <input type="text" class="form-control opacity-75 mb-2" id="addSubject" name="subject" required>
                                </div>

                                <div class="form-group">
                                    <label for="addDescription">Description:</label>
                                    <input type="text" class="form-control opacity-75 mb-2" id="addDescription" name="description" required>
                                </div>

                                <div class="form-group">
                                    <label for="addCode">Code:</label>
                                    <input type="text" class="form-control opacity-75 mb-2" id="addCode" name="code" required>
                                </div>

                                <div class="form-group">
                                  <label for="addCredits">Credits:</label>
                                  <input type="number" class="form-control opacity-75 mb-2" id="addCredits" name="credits" required>
                              </div>

                              <div class="form-group">
                                <label for="addSemester">Semester:</label>
                                <input type="text" class="form-control opacity-75 mb-2" id="addSemester" name="semester" required>
                            </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Add Subject</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

              <div class="table-responsive">
                <table id="dataTableExample" class="table">
                  <thead>
                    <tr>
                      <th>Subject</th>
                      <th>Description</th>
                      <th>Code</th>
                      <th>Credits</th>
                      <th>Semester</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($subjects as $subject)
                    <tr>
                        <td>{{ $subject->subject }}</td>
                        <td>{{ $subject->description }}</td>
                        <td>{{ $subject->code }}</td>
                        <td>{{ $subject->credits }}</td>
                        <td>{{ $subject->semester }}</td>
                        <td>
                          <!-- Edit Button -->
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $subject->id }}">
                          Edit
                          </button>
                          <!-- Modal -->
                          <div class="modal fade" id="editModal{{ $subject->id }}" tabindex="-1" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                      <h5 class="modal-title">Edit Subject</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                      </div>
                                      <div class="modal-body">
                                          <form id="editForm{{ $subject->id }}" action="{{ route('subject.update', ['id' => $subject->id]) }}" method="post">
                                              @csrf
                                              @method('PUT')
                          
                                              <div class="form-group">
                                                  <label for="">Subject:</label>
                                                  <input type="text" class="form-control opacity-75 mb-2" id="" name="subject" value="{{ $subject->subject }}" required>
                                              </div>
                          
                                              <div class="form-group">
                                                  <label for="editDescription{{ $subject->id }}">Description:</label>
                                                  <input type="text" class="form-control opacity-75 mb-2" id="editDescription{{ $subject->id }}" name="description" value="{{ $subject->description }}" required>
                                              </div>
                          
                                              <div class="form-group">
                                                  <label for="editCode{{ $subject->id }}">Code:</label>
                                                  <input type="text" class="form-control opacity-75 mb-2" id="editCode{{ $subject->id }}" name="code" value="{{ $subject->code }}" required>
                                              </div>

                                              <div class="form-group">
                                                <label for="editCredits{{ $subject->id }}">Credits:</label>
                                                <input type="number" class="form-control opacity-75 mb-2" id="editCredits{{ $subject->id }}" name="credits" value="{{ $subject->credits }}" required>
                                              </div>

                                              <div class="form-group">
                                                <label for="editSemester{{ $subject->id }}">Credits:</label>
                                                <input type="text" class="form-control opacity-75 mb-2" id="editSemester{{ $subject->id }}" name="semester" value="{{ $subject->semester }}" required>
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
                          <form action="{{ route('subject.destroy', ['id' => $subject->id]) }}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Are you sure you want to delete {{$subject->subject}}')">Delete</button>
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