@extends('frontend.template')

@section('title','Frequently Asked Questions')

@section('content')
    <div class="container my-5">
        <h1 class="text-center">Frequently Asked Questions</h1>
        <p class="text-center">Find your answer here!</p>
        <div class="accordion my-5" style="margin:auto; max-width:80%;" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    What is JobCareer?
                </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    JobCareer adalah sebuah website perusahaan yang bertujuan untuk mempublikasikan lowongan pekerjaan yang dibutuhkan oleh perusahaan. Selain itu, pelamar juga dapat apply pekerjaan lewat website ini agar memudahkan proses rekrutmen pada perusahaan ini.
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Berapa lama proses rekrutmen pada perusahaan ini?
                </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Pada perusahaan ini terdapat 3 proses rekrutmen. Untuk setiap rekrutmen maximal membutuhkan waktu 1 minggu untuk selesai, maka untuk proses rekrutmen di perusahaan ini memakan maximal 3 minggu untuk selesai.
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Apakah lowongan pekerjaan beragam?
                </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Lowongan pekerjaan yang dibutuhkan di perusahaan ini sangat beragam dengan tipe pekerjaan yang beragam mulai dari Internship, Contract, dan Permanent dengan kebutuhan yang berbeda-beda.
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection