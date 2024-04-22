@extends('backend.template')

@section('title','Job Request')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-start">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Insert Job Request</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('create-jobrequest') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="jobtitle" class="col-md-2 col-form-label text-md-left">Job Title</label>

                                <div class="col-md-4">
                                    <select id="jobtitle" class="form-control @error('jobtitle') is-invalid @enderror" name="jobtitle" required autocomplete="jobtitle" autofocus>
                                        <option value=""></option>
                                        @foreach ($jobtitle as $item)    
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('jobtitle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jobtype" class="col-md-2 col-form-label text-md-left">Job Type</label>

                                <div class="col-md-4">
                                    <select id="jobtype" class="form-control @error('jobtype') is-invalid @enderror" name="jobtype" required autocomplete="jobtype" autofocus>
                                        <option value=""></option>
                                        @foreach ($jobtype as $item)    
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('jobtype')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="location" class="col-md-2 col-form-label text-md-left">Location</label>

                                <div class="col-md-4">
                                    <select id="location" class="form-control @error('location') is-invalid @enderror" name="location" required autocomplete="location" autofocus>
                                        <option value=""></option>
                                        @foreach ($location as $item)    
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="education" class="col-md-2 col-form-label text-md-left">Education</label>

                                <div class="col-md-4">
                                    <select id="education" class="form-control @error('education') is-invalid @enderror" name="education" required autocomplete="education" autofocus>
                                        <option value=""></option>
                                        @foreach ($education as $item)    
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('education')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="workexperience" class="col-md-2 col-form-label text-md-left">Work Experience</label>

                                <div class="col-md-4">
                                    <select id="workexperience" class="form-control @error('workexperience') is-invalid @enderror" name="workexperience" required autocomplete="workexperience" autofocus>
                                        <option value=""></option>
                                        @foreach ($workexperience as $item)    
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('workexperience')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quota" class="col-md-2 col-form-label text-md-left">Quota</label>

                                <div class="col-md-4">
                                    <input id="quota" type="number" class="form-control @error('quota') is-invalid @enderror" name="quota" required autocomplete="quota" autofocus>

                                    @error('quota')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="salary" class="col-md-2 col-form-label text-md-left">Salary</label>

                                <div class="col-md-4">
                                    <input id="salary" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" required autocomplete="salary" autofocus>

                                    @error('salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-2 col-form-label text-md-left">Description</label>

                                <div class="col-md-4">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="requirement" class="col-md-2 col-form-label text-md-left">Requirement</label>

                                <div class="col-md-4">
                                    <input id="requirement" type="text" class="form-control @error('requirement') is-invalid @enderror" name="requirement" required autocomplete="requirement" autofocus>

                                    @error('requirement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-2 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection