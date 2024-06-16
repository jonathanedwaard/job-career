<?php

namespace App\Http\Controllers;

use App\Models\JobTitle;
use App\Models\JobSpecialization;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = JobTitle::all();
        return view('backend.masterdata.jobtitle.table', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = JobSpecialization::all();
        return view('backend.masterdata.jobtitle.jobtitle', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            "name"=>"required",
            "jobspecialization"=>"required",
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        JobTitle::insert([
            "name"=>$request->name,
            "jobspecialization"=>$request->jobspecialization,
            "createdby"=>Auth::user()->id,
            "created_at"=>Carbon::now(),
            "updatedby"=>Auth::user()->id,
            "updated_at"=>Carbon::now()
        ]);

        return redirect("/backend/jobtitle")->with('message', 'Save successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $items = JobTitle::find($id);
        $item = JobSpecialization::all();
        return view("backend.masterdata.jobtitle.jobtitledetail", compact('items', 'item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobTitle $jobTitle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            "name"=>"required",
            "jobspecialization"=>"required",
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $isactive = $request->has('isactive') ? 'Y' : 'N';

        JobTitle::where("id", $id)->update([
            "name"=>$request->name,
            "jobspecialization"=>$request->jobspecialization,
            "isactive"=>$isactive,
            "updatedby"=>Auth::user()->id,
            "updated_at"=>Carbon::now()
        ]);

        return redirect("/backend/jobtitle")->with('message', 'Save successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $items = JobTitle::find($id);
        if(isset($items)) {
            $items->delete();
        }

        return redirect("/backend/jobtitle")->with('message', 'Delete successfully!');
    }
}
