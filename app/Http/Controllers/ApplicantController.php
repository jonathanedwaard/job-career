<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Applicant;
use App\Models\JobRequest;
use App\Models\Education;
use App\Models\WorkExperience;
use App\Mail\Interview;
use App\Mail\Accepted;
use App\Mail\Rejected;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Applicant::all();
        return view('backend.menu.applicant.table', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $rules = [
            "salary"=>'required',
            "phone"=>'required',
            "gender"=>'required',
            "linkedin"=>'required',
            'file'=>'required|mimes:pdf',
            "education"=>'required',
            "workexperience"=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        if ($request->file('file')->isValid()) {
            $file = $request->file('file');
            $path = $file->store('uploads', 'public');
        }

        $isAccepted = "";
        $isSalary = false;
        $isEducation = false;
        $isWorkExperience = false;

        $jobRequest = JobRequest::find($id);
        $quota = $jobRequest->quota;
        $salary = $jobRequest->salary;
        $education = $jobRequest->educations->sequence;
        $workexperience = $jobRequest->workexperience;

        $educations = Education::find($request->education);
        $educationSequence = $educations->sequence;

        $workexperiences = WorkExperience::find($request->workexperience);
        $workexperiencesSequence = $workexperiences->sequence;

        if($request->salary<=$salary) {
            $isSalary = true;
        } else {
            $isSalary = false;
        }

        if($education<=$educationSequence) {
            $isEducation = true;
        } else {
            $isEducation = false;
        }

        if($workexperience>=$workexperiencesSequence) {
            $isWorkExperience = true;
        } else {
            $isWorkExperience = false;
        }

        if($isSalary && $isEducation && $isWorkExperience) {
            $isAccepted = "Y";
        } else {
            $isAccepted = "N";
        }

        Applicant::insert([
            "salary"=> $request->salary,
            "phone"=> $request->phone,
            "gender"=> $request->gender,
            "linkedin"=> $request->linkedin,
            'cv'=> $path,
            "user"=> Auth::id(),
            "jobrequest"=> $id,
            "education"=> $request->education,
            "workexperience"=> $request->workexperience,
            "isaccepted"=> $isAccepted,
            "created_at"=> Carbon::now(),
            "updated_at"=> Carbon::now()
        ]);

        return redirect("/frontend/jobdetail/".$id)->with('message', 'Apply successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $items = Applicant::find($id);
        return view("backend.menu.applicant.applicantdetail", compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applicant $applicant)
    {
        //
    }

    public function acceptApplicant($id) {
        Applicant::where("id", $id)->update([
            "status"=>"Completed",
            "updated_at"=>Carbon::now()
        ]);

        $jobID = Applicant::where('id', $id)->value("jobrequest");
        $jobRequest = JobRequest::find($jobID);
        $quota = $jobRequest->quota - 1;
        if($quota>0) {
            JobRequest::where("id", $jobID)->update([
                "quota"=>$quota,
                "updatedby"=>Auth::user()->id,
                "updated_at"=>Carbon::now()
            ]);
        } else {
            JobRequest::where("id", $jobID)->update([
                "quota"=>$quota,
                "isactive"=>'N',
                "updatedby"=>Auth::user()->id,
                "updated_at"=>Carbon::now()
            ]);
        }

        $items = Applicant::find($id);
        $candidateName = $items->users->name;
        $candidateEmail = $items->users->email;

        Mail::to($candidateEmail)->send(new Accepted($candidateName));

        return redirect("/backend/applicant")->with('message', 'Applicant accepted successfully!');
    }

    public function rejectApplicant($id) {
        $items = Applicant::find($id);
        $candidateName = $items->users->name;
        $candidateEmail = $items->users->email;
        
        if(isset($items)) {
            $items->delete();
        }
        Mail::to($candidateEmail)->send(new Rejected($candidateName));

        return redirect("/backend/applicant")->with('message', 'Applicant rejected successfully!');
    }

    public function interviewApplicant($id) {
        Applicant::where("id", $id)->update([
            "status"=>"Interview",
            "updated_at"=>Carbon::now()
        ]);

        $items = Applicant::find($id);
        $candidateName = $items->users->name;
        $candidateEmail = $items->users->email;

        Mail::to($candidateEmail)->send(new Interview($candidateName));

        return redirect("/backend/applicant")->with('message', 'Interview invitation sent successfully!');
    }
}
