@extends('backend.template')

@section('title','Applicant')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-start">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Applicant Detail</div>
                    
                    <div class="card-body">
                        
                        <div class="form-group row mb-3">
                                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $items->users->name }}" disabled>
                                </div>
                                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter date of birth" value="{{ $items->users->dateofbirth }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ $items->users->email }}" disabled>
                                </div>
                                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number" value="{{ $items->phone }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                    <label for="gender">Gender</label>
                                    <input type="text" class="form-control" id="gender" name="gender" placeholder="Enter gender" value="{{ $items->gender }}" disabled>
                                </div>
                                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                    <label for="linkedin">Linkedin</label>
                                    <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Enter linkedin" value="{{ $items->linkedin }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                    <label for="education">Last Education</label>
                                    <input type="text" class="form-control" id="education" name="education" placeholder="Enter education" value="{{ $items->educations->name }}" disabled>
                                </div>
                                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                    <label for="workexperience">Work Experience</label>
                                    <input type="text" class="form-control" id="workexperience" name="workexperience" placeholder="Enter workexperience" value="{{ $items->work_experiences->name }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                    <label for="salary">Expected Salary</label>
                                    <input type="number" class="form-control" id="salary" name="salary" placeholder="Enter expected salary" value="{{ $items->salary }}" disabled>
                                </div>
                                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                    <label for="status">Applicant Status</label>
                                    <input type="text" class="form-control" id="status" name="status" placeholder="Enter status" value="{{ $items->status }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                            @if($items->status != 'Completed')
                                @if($items->status == 'Interview')
                                <div class="form-group col-sm-3 mb-3 mb-sm-0">
                                    <form method="POST" enctype="multipart/form-data" action="{{ route('accept-applicant', $items->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-user btn-block">Accept</button>
                                    </form>
                                </div>
                                @endif
                                <div class="form-group col-sm-3 mb-3 mb-sm-0">
                                    <form method="POST" enctype="multipart/form-data" action="{{ route('reject-applicant', $items->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-user btn-block">Reject</button>
                                    </form>
                                </div>
                                @if($items->status != 'Interview') 
                                <div class="form-group col-sm-3 mb-3 mb-sm-0">
                                    <form method="POST" enctype="multipart/form-data" action="{{ route('interview-applicant', $items->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-user btn-block">Call Interview</button>
                                    </form>
                                </div>
                                @endif
                            @endif
                            <div class="form-group col-sm-3 mb-3 mb-sm-0">
                                <a class="ml-1 mb-2 font-weight-bold btn btn-primary btn-user btn-block" href="{{ asset('storage/' . $items->cv) }}" download="{{ 'CV_' . $items->users->name . '.pdf' }}">Download Resume</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection