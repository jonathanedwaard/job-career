<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
        .footer {
            color: #fff;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-light mt-3">
            <div class="container-fluid">
                <a class="navbar-brand text-primary fw-bolder" href="/">JobCareer</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-lg-flex justify-content-lg-end" id="navbarNav">
                    <ul class="navbar-nav fw-bolder me-2">
                        <li class="nav-item">
                            <a class="nav-link text-primary" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="/frontend/career">Career</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="/frontend/internship">Internship Program</a>
                        </li>
                        @auth
                            @if (Auth::user()->role == "Admin")
                                <li class="nav-item">
                                    <a class="nav-link text-primary" href="/backend/dashboard">Dashboard</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                    @auth
                        <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                    @endauth
                    @guest
                        <a class="btn btn-primary" href="/backend/login">Login</a>
                    @endguest
                </div>
            </div>
        </nav>
    </div>
    <div class="content">
        @yield('content')
    </div>
    <div class="footer bg-primary">
        <div class="container">
            <div class="container-fluid py-4">
                <div class="d-lg-flex justify-content-lg-between text-center">
                    <a class="navbar-brand fw-bolder fs-4" href="/frontend/home">JobCareer</a>
                    <ul class="navbar-nav d-lg-flex flex-lg-row gap-lg-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/frontend/aboutus">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/frontend/faq">Frequently Asked Question</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/frontend/privacy">Privacy Policy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
