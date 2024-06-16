@extends('frontend.template')

@section('title','Job Detail')

@section('content')
    <div class="container my-5">
        <div class="card mb-5">
            <h5 class="card-header">{{ $items->job_titles->name }} ({{ $items->job_types->name }})</h5>
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">{{ $items->job_titles->job_specializations->name }} - {{ $items->locations->name }}</h6>
                <div class="flex mt-3">
                    <h5 class="card-text flex-grow-1">Description : </h5>
                    <p class="card-text flex-grow-1">{{ $items->description }}</p>
                </div>
                <div class="flex mt-3">
                    <h5 class="card-text flex-grow-1">Requirement : </h5>
                    <p class="card-text flex-grow-1">{{ $items->requirement }}</p>
                </div>
                @guest
                    <a href="/backend/login" class="btn btn-primary mt-3">Apply</a>
                @endguest
            </div>
        </div>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @auth
        <div class="card">
            <h5 class="card-header">Apply as {{ $items->job_titles->name }}</h5>
            <div class="card-body">
                <form class="user" method="POST" enctype="multipart/form-data" action="{{ route('apply-job', $items->id) }}">
                    @csrf
                    <div class="form-group row mb-3">
                        <div class="form-group col-sm-6 mb-3 mb-sm-0">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ Auth::user()->name }}" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-3 mb-sm-0">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter date of birth" value="{{ Auth::user()->dateofbirth }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="form-group col-sm-6 mb-3 mb-sm-0">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ Auth::user()->email }}" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-3 mb-sm-0">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="form-group col-sm-6 mb-3 mb-sm-0">
                            <label for="gender">Gender</label>
                            <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required autocomplete="gender">
                                <option value="" selected>Enter gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6 mb-3 mb-sm-0">
                            <label for="linkedin">Linkedin</label>
                            <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Enter linkedin" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="form-group col-sm-6 mb-3 mb-sm-0">
                            <label for="education">Last Education</label>
                            <select id="education" class="form-control @error('education') is-invalid @enderror" name="education" required autocomplete="education">
                                <option value="" selected>Enter last education</option>
                                @foreach ($education as $item)    
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6 mb-3 mb-sm-0">
                            <label for="workexperience">Work Experience</label>
                            <select id="workexperience" class="form-control @error('workexperience') is-invalid @enderror" name="workexperience" required autocomplete="workexperience">
                                <option value="" selected>Enter Work Experience</option>
                                @foreach ($workexperience as $item)    
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="form-group col-sm-6 mb-3 mb-sm-0">
                            <label for="salary">Expected Salary</label>
                            <input type="number" class="form-control" id="salary" name="salary" placeholder="Enter expected salary" required>
                        </div>
                        <div class="form-group col-sm-6 mb-3 mb-sm-0">
                            <label for="file">Upload CV</label>
                            <input type="file" class="form-control" id="file" name="file" placeholder="Upload CV" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Apply
                    </button>
                </form>
            </div>
        </div>
        @endauth
    </div>
@endsection