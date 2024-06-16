<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\JobRequest;
use App\Models\Location;
use App\Models\JobSpecialization;
use App\Models\Education;
use App\Models\WorkExperience;

class FrontendController extends Controller
{
    public function Home()
    {
        if (Auth::check()) {
            $userSpecialization = Auth::user()->jobspecialization;
            $items = JobRequest::join('job_titles', 'job_requests.jobtitle', '=', 'job_titles.id')
                                ->where('job_titles.jobspecialization', $userSpecialization)
                                ->where('job_requests.isactive', 'Y')
                                ->select('job_requests.*')
                                ->paginate(9);

            if ($items->isEmpty()) {
                $items = JobRequest::where('job_requests.isactive', 'Y')->orderBy('created_at', 'desc')->paginate(9);
            }
        } else {
            $items = JobRequest::where('job_requests.isactive', 'Y')->orderBy('created_at', 'desc')->paginate(9);
        }
        $location = Location::all();
        $jobspecialization = JobSpecialization::all();
        return view('frontend.pages.home', compact('items', 'location', 'jobspecialization'));
    }

    public function Career()
    {
        $items = JobRequest::whereHas('job_types', function($query) {
            $query->where('name', '!=', 'Intern');
        })->paginate(9);
        $location = Location::all();
        $jobspecialization = JobSpecialization::all();
        return view('frontend.pages.career', compact('items', 'location', 'jobspecialization'));
    }

    public function Internship()
    {
        $items = JobRequest::whereHas('job_types', function($query) {
            $query->where('name', 'Intern');
        })->paginate(9);
        $location = Location::all();
        $jobspecialization = JobSpecialization::all();
        return view('frontend.pages.internship', compact('items', 'location', 'jobspecialization'));
    }

    public function FAQ()
    {
        return view('frontend.pages.faq');
    }

    public function AboutUs()
    {
        return view('frontend.pages.aboutus');
    }

    public function Privacy()
    {
        return view('frontend.pages.privacy');
    }

    public function JobDetail($id)
    {
        $items = JobRequest::find($id);
        $education = Education::all();
        $workexperience = WorkExperience::all();
        return view('frontend.pages.jobdetail', compact('items', 'education', 'workexperience'));
    }

    public function SearchJob(Request $request) {
        $jobTitle = $request->jobtitle;
        $locationId = $request->location;
        $jobSpecializationId = $request->jobspecialization;

        $jobRequests = JobRequest::query()
            ->join('job_titles', 'job_requests.jobtitle', '=', 'job_titles.id');

        if ($jobTitle) {
            $jobRequests->whereHas('job_titles', function ($query) use ($jobTitle) {
                $query->where('name', 'LIKE', '%' . $jobTitle . '%');
            });
        }

        if ($locationId) {
            $jobRequests->where('location', $locationId);
        }

        if ($jobSpecializationId) {
            $jobRequests->whereHas('job_titles', function ($query) use ($jobSpecializationId) {
                $query->where('jobspecialization', $jobSpecializationId);
            });
        }

        $jobRequests->where('job_requests.isactive', 'Y');

        $items = $jobRequests->get();
        $location = Location::all();
        $jobspecialization = JobSpecialization::all();
        return view('frontend.pages.home', compact('items', 'location', 'jobspecialization'));
    }
}
