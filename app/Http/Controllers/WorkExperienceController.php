<?php

namespace App\Http\Controllers;

use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = WorkExperience::all();
        return view('backend.masterdata.workexperience.table', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.masterdata.workexperience.workexperience');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            "name"=>"required",
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        WorkExperience::insert([
            "name"=>$request->name,
            "createdby"=>Auth::user()->id,
            "created_at"=>Carbon::now(),
            "updatedby"=>Auth::user()->id,
            "updated_at"=>Carbon::now()
        ]);

        return redirect("/backend/workexperience");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $items = WorkExperience::find($id);
        return view("backend.masterdata.workexperience.workexperiencedetail", compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkExperience $workExperience)
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
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $isactive = $request->has('isactive') ? 'Y' : 'N';

        WorkExperience::where("id", $id)->update([
            "name"=>$request->name,
            "isactive"=>$isactive,
            "updatedby"=>Auth::user()->id,
            "updated_at"=>Carbon::now()
        ]);

        return redirect("/backend/workexperience");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $items = WorkExperience::find($id);
        if(isset($items)) {
            $items->delete();
        }

        return redirect("/backend/workexperience");
    }
}
