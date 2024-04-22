@extends('backend.template')

@section('title','User')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-start">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Update User</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('update-user', $items->id) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-left">Name</label>

                                <div class="col-md-4">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $items->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-left">Email</label>

                                <div class="col-md-4">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $items->email }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-2 col-form-label text-md-left">Password</label>

                                <div class="col-md-4">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" required autocomplete="password" autofocus>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dob" class="col-md-2 col-form-label text-md-left">Date of Birth</label>

                                <div class="col-md-2">
                                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ $items->dateofbirth }}" required autocomplete="dob" autofocus>

                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="isactive" class="col-md-2 col-form-label text-md-left">Active</label>

                                <div class="col-md-1 d-flex align-items-center justify-content-start">
                                    <input id="isactive" type="checkbox" class="form-control-sm @error('isactive') is-invalid @enderror mr-2" name="isactive" autocomplete="isactive" autofocus {{ $items->isactive === 'Y' ? 'checked' : '' }}>

                                    @error('isactive')
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