@extends('frontend.template')

@section('title','Home')

@section('content')
    <div class="container my-5">
        <div class="d-lg-flex flex-row justify-content-between align-items-center my-5">
            <div class="pe-5">
                <h1 class="fs-4 fw-bold mb-4" style="width:70%;">Join out thriving team and be a part of our company's success</h1>
                <a href="/frontend/career" class="btn btn-primary">Join Now</a>
            </div>
            <img width="300px" class="d-lg-block d-none" src="{{ asset('img/login_img.png') }}" alt="">
        </div>
    </div>
    <div class="">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path width="100%" fill="#0d6efd" fill-opacity="1" d="M0,128L24,122.7C48,117,96,107,144,112C192,117,240,139,288,128C336,117,384,75,432,69.3C480,64,528,96,576,128C624,160,672,192,720,181.3C768,171,816,117,864,106.7C912,96,960,128,1008,160C1056,192,1104,224,1152,218.7C1200,213,1248,171,1296,128C1344,85,1392,43,1416,21.3L1440,0L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z"></path>
        </svg>
        <div class="bg-primary">
            <div class="container">
                <h1 class="fw-bold text-center text-white">Our Recruirement Process</h1>
                <div class="d-flex flex-lg-row flex-column justify-content-between align-items-center py-5 gap-5">
                    <div class="card d-flex flex-column h-100" style="width: 18rem;">
                        <div class="card-body d-flex flex-column h-100">
                            <h5 class="card-title text-primary">1</h5>
                            <h6 class="card-subtitle mb-2 text-muted fw-bold text-black">Fill required information</h6>
                            <p class="card-text flex-grow-1">Pengisian data pelamar, yang melibatkan pengumuman lowongan melalui berbagai saluran, pengisian formulir aplikasi oleh pelamar, serta penyaringan awal berdasarkan kualifikasi yang telah ditentukan.</p>
                        </div>
                    </div>
                    <div class="card d-flex flex-column h-100" style="width: 18rem;">
                        <div class="card-body d-flex flex-column h-100">
                            <h5 class="card-title text-primary">2</h5>
                            <h6 class="card-subtitle mb-2 text-muted fw-bold text-black">Interview and test</h6>
                            <p class="card-text flex-grow-1">Tahap wawancara dan tes dilakukan untuk mengevaluasi kemampuan dan kesesuaian pelamar dengan posisi yang dibutuhkan. Proses ini mencakup wawancara tatap muka, dan tes kemampuan simulasi pekerjaan.</p>
                        </div>
                    </div>
                    <div class="card d-flex flex-column h-100" style="width: 18rem;">
                        <div class="card-body d-flex flex-column h-100">
                            <h5 class="card-title text-primary">3</h5>
                            <h6 class="card-subtitle mb-2 text-muted fw-bold text-black">Negotiate</h6>
                            <p class="card-text flex-grow-1">Perusahaan memberikan penawaran kerja yang mencakup rincian posisi, gaji, tunjangan, dan benefit. Setelah kesepakatan dicapai, memperkenalkan pelamar kepada tim, dan pelatihan awal yang diperlukan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-5" id="jobs">
            <div class="mb-5">
                <h1 class="fw-bold fs-3 text-center">Explore our <span class="text-primary">open job</span></h1>
                <p class="w-75 m-auto text-center">Cari pekerjaan yang sesuai dengan latar belakang kamu!</p>
            </div>
            <div class="mb-5">
                <form action="{{ route('search-job') }}#jobs" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="d-flex flex-row justify-content-between gap-5">
                        <input type="text" id="jobtitle" class="form-control" name="jobtitle" placeholder="Job Title">
                        <select id="location" class="form-select" name="location" autocomplete="location">
                            <option value="" selected>Location</option>
                            @foreach ($location as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <select id="jobspecialization" class="form-select" name="jobspecialization" autocomplete="jobspecialization">
                            <option value="" selected>Job Specialization</option>
                            @foreach ($jobspecialization as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
            <div>
                @if($items->isEmpty())
                <h1 class="text-center fs-4">There are no data right now ... </h1>
                @else
                    <div class="d-flex flex-wrap justify-content-between" style="gap: 1rem;">
                        @foreach($items as $item)
                        <div class="d-flex flex-column mb-3" style="flex: 0 0 calc(33.333% - 1rem); max-width: calc(33.333% - 1rem);">
                            <div class="card d-flex flex-column h-100" style="width: 100%;">
                                <div class="card-body d-flex flex-column h-100">
                                    <h5 class="card-title" style="background: linear-gradient(to right, #ff7e5f, #0d6efd); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ $item->job_titles->name }} ({{ $item->job_types->name }})</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $item->job_titles->job_specializations->name }} - {{ $item->locations->name }}</h6>
                                    <p class="card-text flex-grow-1">{{ $item->description }}</p>
                                    <a href="/frontend/jobdetail/{{ $item->id }}" class="btn btn-primary mt-auto">Job Detail</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- Add dummy columns to ensure there are always 3 columns per row -->
                        @for($i = 0; $i < (3 - count($items) % 3) % 3; $i++)
                            <div class="d-flex flex-column mb-3" style="flex: 0 0 calc(33.333% - 1rem); max-width: calc(33.333% - 1rem); visibility: hidden;">
                                <!-- This empty div ensures the layout has 3 columns per row -->
                            </div>
                        @endfor
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection