<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JobRequest;
use App\Models\Applicant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'Admin')->count();
        $activeJob = JobRequest::where('isactive', 'Y')->count();
        $nonActiveJob = JobRequest::where('isactive', 'N')->count();
        $applicant = Applicant::where('status', '!=' , 'Completed')->count();

        $totalQuota = JobRequest::sum('quota');
        $completedQuota = Applicant::where('status', 'Completed')->count();
        $targetQuota = $totalQuota + $completedQuota;
        $data = [$completedQuota, $targetQuota];
        return view('backend.menu.dashboard', compact('user', 'activeJob', 'nonActiveJob', 'applicant', 'data', 'totalQuota'));
    }
}
