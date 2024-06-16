@extends('frontend.template')

@section('title','Internship Program')

@section('content')
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
                    <nav aria-label="Page navigation example" class="mt-4">
                        <ul class="pagination justify-content-center">
                            {{ $items->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
@endsection