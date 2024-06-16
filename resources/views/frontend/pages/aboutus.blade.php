@extends('frontend.template')

@section('title','About Us')

@section('content')
    <div class="container my-5">
        <div class="d-lg-flex flex-row justify-content-between align-items-center my-5">
            <div class="pe-5">
                <h1>Who Are We?</h1>
                <p>JobCareer adalah sebuah website perusahaan yang bertujuan untuk mempublikasikan lowongan pekerjaan yang dibutuhkan oleh perusahaan. Selain itu, pelamar juga dapat apply pekerjaan lewat website ini agar memudahkan proses rekrutmen pada perusahaan ini.</p>
            </div>
            <img src="{{ asset('img/aboutus_img.png') }}" alt="">
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-primary fw-bold">21</h5>
                        <p class="card-text fw-bold fs-5">Homebase</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-primary fw-bold">500+</h5>
                        <p class="card-text fw-bold fs-5">Employee</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-primary fw-bold">50</h5>
                        <p class="card-text fw-bold fs-5">Client</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection