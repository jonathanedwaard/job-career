@extends('backend.template')

@section('title','Education')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-start">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Insert Job Title</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('create-jobtitle') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-left">Name</label>

                                <div class="col-md-4">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jobspecialization" class="col-md-2 col-form-label text-md-left">Job Specialization</label>

                                <div class="col-md-4">
                                    <select id="jobspecialization" class="form-control @error('jobspecialization') is-invalid @enderror" name="jobspecialization" required autocomplete="jobspecialization" autofocus>
                                        <option value=""></option>
                                        @foreach ($items as $item)    
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('jobspecialization')
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