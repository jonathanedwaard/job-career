<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JobRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $activeJob = JobRequest::where('isactive', 'Y')->count();
        $nonActiveJob = JobRequest::where('isactive', 'N')->count();
        return view('backend.menu.dashboard', compact('user', 'activeJob', 'nonActiveJob'));
    }
}
