<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EducationController;
use App\Http\Controllers\JobSpecializationController;
use App\Http\Controllers\JobTitleController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\JobRequestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ApplicantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Begin Backend Routes

// Education
Route::get('/backend/education', [EducationController::class,'index'])->middleware('admin');
Route::get('/backend/create-education', [EducationController::class,'create'])->middleware('admin');
Route::post('/backend/create-education', [EducationController::class,'store'])->name('create-education')->middleware('admin');
Route::get('/backend/education/{id}', [EducationController::class,'show'])->middleware('admin');
Route::post('/backend/education/{id}', [EducationController::class,'update'])->name('update-education')->middleware('admin');
Route::delete('/backend/education/{id}', [EducationController::class,'destroy'])->name('delete-education')->middleware('admin');

// Job Specializations
Route::get('/backend/jobspecialization', [JobSpecializationController::class,'index'])->middleware('admin');
Route::get('/backend/create-jobspecialization', [JobSpecializationController::class,'create'])->middleware('admin');
Route::post('/backend/create-jobspecialization', [JobSpecializationController::class,'store'])->name('create-jobspecialization')->middleware('admin');
Route::get('/backend/jobspecialization/{id}', [JobSpecializationController::class,'show'])->middleware('admin');
Route::post('/backend/jobspecialization/{id}', [JobSpecializationController::class,'update'])->name('update-jobspecialization')->middleware('admin');
Route::delete('/backend/jobspecialization/{id}', [JobSpecializationController::class,'destroy'])->name('delete-jobspecialization')->middleware('admin');

// Job Title
Route::get('/backend/jobtitle', [JobTitleController::class,'index'])->middleware('admin');
Route::get('/backend/create-jobtitle', [JobTitleController::class,'create'])->middleware('admin');
Route::post('/backend/create-jobtitle', [JobTitleController::class,'store'])->name('create-jobtitle')->middleware('admin');
Route::get('/backend/jobtitle/{id}', [JobTitleController::class,'show'])->middleware('admin');
Route::post('/backend/jobtitle/{id}', [JobTitleController::class,'update'])->name('update-jobtitle')->middleware('admin');
Route::delete('/backend/jobtitle/{id}', [JobTitleController::class,'destroy'])->name('delete-jobtitle')->middleware('admin');

// Job Type
Route::get('/backend/jobtype', [JobTypeController::class,'index'])->middleware('admin');
Route::get('/backend/create-jobtype', [JobTypeController::class,'create'])->middleware('admin');
Route::post('/backend/create-jobtype', [JobTypeController::class,'store'])->name('create-jobtype')->middleware('admin');
Route::get('/backend/jobtype/{id}', [JobTypeController::class,'show'])->middleware('admin');
Route::post('/backend/jobtype/{id}', [JobTypeController::class,'update'])->name('update-jobtype')->middleware('admin');
Route::delete('/backend/jobtype/{id}', [JobTypeController::class,'destroy'])->name('delete-jobtype')->middleware('admin');

// Location
Route::get('/backend/location', [LocationController::class,'index'])->middleware('admin');
Route::get('/backend/create-location', [LocationController::class,'create'])->middleware('admin');
Route::post('/backend/create-location', [LocationController::class,'store'])->name('create-location')->middleware('admin');
Route::get('/backend/location/{id}', [LocationController::class,'show'])->middleware('admin');
Route::post('/backend/location/{id}', [LocationController::class,'update'])->name('update-location')->middleware('admin');
Route::delete('/backend/location/{id}', [LocationController::class,'destroy'])->name('delete-location')->middleware('admin');

// User
Route::get('/backend/login', [UserController::class,'login']);
Route::get('/backend/register', [UserController::class,'registerView']);
Route::post('/backend/login', [UserController::class,'authenticate'])->name('login');
Route::post('/backend/register', [UserController::class,'register'])->name('register');
Route::get('/backend/logout', [UserController::class,'logout'])->name('logout');
Route::get('/backend/user', [UserController::class,'index'])->middleware('admin');
Route::get('/backend/create-user', [UserController::class,'create'])->middleware('admin');
Route::post('/backend/create-user', [UserController::class,'store'])->name('create-user')->middleware('admin');
Route::get('/backend/user/{id}', [UserController::class,'show'])->middleware('admin');
Route::post('/backend/user/{id}', [UserController::class,'update'])->name('update-user')->middleware('admin');
Route::delete('/backend/user/{id}', [UserController::class,'destroy'])->name('delete-user')->middleware('admin');

// Work Experience
Route::get('/backend/workexperience', [WorkExperienceController::class,'index'])->middleware('admin');
Route::get('/backend/create-workexperience', [WorkExperienceController::class,'create'])->middleware('admin');
Route::post('/backend/create-workexperience', [WorkExperienceController::class,'store'])->name('create-workexperience')->middleware('admin');
Route::get('/backend/workexperience/{id}', [WorkExperienceController::class,'show'])->middleware('admin');
Route::post('/backend/workexperience/{id}', [WorkExperienceController::class,'update'])->name('update-workexperience')->middleware('admin');
Route::delete('/backend/workexperience/{id}', [WorkExperienceController::class,'destroy'])->name('delete-workexperience')->middleware('admin');

// Work Experience
Route::get('/backend/jobrequest', [JobRequestController::class,'index'])->middleware('admin');
Route::get('/backend/create-jobrequest', [JobRequestController::class,'create'])->middleware('admin');
Route::post('/backend/create-jobrequest', [JobRequestController::class,'store'])->name('create-jobrequest')->middleware('admin');
Route::get('/backend/jobrequest/{id}', [JobRequestController::class,'show'])->middleware('admin');
Route::post('/backend/jobrequest/{id}', [JobRequestController::class,'update'])->name('update-jobrequest')->middleware('admin');
Route::delete('/backend/jobrequest/{id}', [JobRequestController::class,'destroy'])->name('delete-jobrequest')->middleware('admin');

// Work Experience

// Applicant

Route::get('/backend/applicant', [ApplicantController::class,'index'])->middleware('admin');
Route::get('/backend/applicant/{id}', [ApplicantController::class,'show'])->middleware('admin');
Route::post('/backend/applicant/{id}/accept', [ApplicantController::class, 'acceptApplicant'])->name('accept-applicant')->middleware('admin');
Route::post('/backend/applicant/{id}/reject', [ApplicantController::class, 'rejectApplicant'])->name('reject-applicant')->middleware('admin');
Route::post('/backend/applicant/{id}/interview', [ApplicantController::class, 'interviewApplicant'])->name('interview-applicant')->middleware('admin');
Route::post('/frontend/jobdetail/{id}', [ApplicantController::class,'store'])->name("apply-job");

// Applicant

Route::get('/backend/dashboard', [DashboardController::class,'index'])->middleware('admin');

// End Backend Routes

// Start Frontend Routes

Route::get('/', [FrontendController::class,'home']);
Route::get('/frontend/career', [FrontendController::class,'career']);
Route::get('/frontend/internship', [FrontendController::class,'internship']);
Route::get('/frontend/faq', [FrontendController::class,'faq']);
Route::get('/frontend/aboutus', [FrontendController::class,'aboutus']);
Route::get('/frontend/privacy', [FrontendController::class,'privacy']);
Route::get('/frontend/jobdetail/{id}', [FrontendController::class,'jobdetail']);
Route::post('/frontend/searchjob', [FrontendController::class,'searchjob'])->name('search-job');

// End Frontend Routes
