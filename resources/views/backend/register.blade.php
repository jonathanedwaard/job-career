<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Name">
                                        @if ($errors->has("name"))
                                            <span class="text-danger"><i class="fa-solid fa-circle-exclamation me-2"></i>{{ $errors->first("name") }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
                                        @if ($errors->has("dob"))
                                            <span class="text-danger"><i class="fa-solid fa-circle-exclamation me-2"></i>{{ $errors->first("dob") }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email Address">
                                        @if ($errors->has("email"))
                                            <span class="text-danger"><i class="fa-solid fa-circle-exclamation me-2"></i>{{ $errors->first("email") }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select id="jobspecialization" class="form-control @error('jobspecialization') is-invalid @enderror" name="jobspecialization" required autocomplete="jobspecialization">
                                            <option value="" selected>Job Specialization</option>
                                            @foreach ($items as $item)    
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control"
                                            id="password" name="password" placeholder="Password">
                                        @if ($errors->has("password"))
                                            <span class="text-danger"><i class="fa-solid fa-circle-exclamation me-2"></i>{{ $errors->first("password") }}</span>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    Register
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <p class="fw-bold small">Already have an account? <a href="login">Login!</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>