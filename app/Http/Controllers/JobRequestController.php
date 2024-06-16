<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\JobRequest;
use App\Models\JobTitle;
use App\Models\JobType;
use App\Models\Location;
use App\Models\Education;
use App\Models\WorkExperience;

class JobRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = JobRequest::all();
        return view('backend.menu.jobrequest.table', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jobtitle = JobTitle::all();
        $jobtype  = JobType::all();
        $location = Location::all();
        $education = Education::all();
        $workexperience = WorkExperience::all();
        return view('backend.menu.jobrequest.jobrequest', compact('jobtitle', 'jobtype', 'location', 'education', 'workexperience'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            "jobtitle"=>"required",
            "jobtype"=>"required",
            "location"=>"required",
            "education"=>"required",
            "workexperience"=>"required",
            "quota"=>"required|numeric|min:1"
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        JobRequest::insert([
            "jobtitle"=>$request->jobtitle,
            "jobtype"=>$request->jobtype,
            "location"=>$request->location,
            "education"=>$request->education,
            "workexperience"=>$request->workexperience,
            "salary"=>$request->salary,
            "description"=>$request->description,
            "requirement"=>$request->requirement,
            "quota"=>$request->quota,
            "createdby"=>Auth::user()->id,
            "created_at"=>Carbon::now(),
            "updatedby"=>Auth::user()->id,
            "updated_at"=>Carbon::now()
        ]);

        return redirect("/backend/jobrequest")->with('message', 'Save successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $items = JobRequest::find($id);
        $jobtitle = JobTitle::all();
        $jobtype  = JobType::all();
        $location = Location::all();
        $education = Education::all();
        $workexperience = WorkExperience::all();
        return view("backend.menu.jobrequest.jobrequestdetail", compact('items', 'jobtitle', 'jobtype', 'location', 'education', 'workexperience'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            "jobtitle"=>"required",
            "jobtype"=>"required",
            "location"=>"required",
            "education"=>"required",
            "workexperience"=>"required",
            "salary"=>"required",
            "description"=>"required",
            "requirement"=>"required",
            "quota"=>"required|numeric|min:1"
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $isactive = $request->has('isactive') ? 'Y' : 'N';

        JobRequest::where("id", $id)->update([
            "jobtitle"=>$request->jobtitle,
            "jobtype"=>$request->jobtype,
            "location"=>$request->location,
            "education"=>$request->education,
            "workexperience"=>$request->workexperience,
            "quota"=>$request->quota,
            "salary"=>$request->salary,
            "description"=>$request->description,
            "requirement"=>$request->requirement,
            "isactive"=>$isactive,
            "createdby"=>Auth::user()->id,
            "created_at"=>Carbon::now(),
            "updatedby"=>Auth::user()->id,
            "updated_at"=>Carbon::now()
        ]);

        return redirect("/backend/jobrequest")->with('message', 'Save successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $items = JobRequest::find($id);
        if(isset($items)) {
            $items->delete();
        }

        return redirect("/backend/jobrequest")->with('message', 'Delete successfully!');
    }
}
