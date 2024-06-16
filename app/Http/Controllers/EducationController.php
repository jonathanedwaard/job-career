<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Education::all();
        return view('backend.masterdata.education.table', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.masterdata.education.education');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            "sequence"=>"required",
            "name"=>"required"
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        Education::insert([
            "sequence"=>$request->sequence,
            "name"=>$request->name,
            "createdby"=>Auth::user()->id,
            "created_at"=>Carbon::now(),
            "updatedby"=>Auth::user()->id,
            "updated_at"=>Carbon::now()
        ]);

        return redirect("/backend/education")->with('message', 'Save successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $items = Education::find($id);
        return view("backend.masterdata.education.educationdetail", compact('items'));
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
            "name"=>"required",
            "sequence"=>"required"
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $isactive = $request->has('isactive') ? 'Y' : 'N';

        Education::where("id", $id)->update([
            "sequence"=>$request->sequence,
            "name"=>$request->name,
            "isactive"=>$isactive,
            "updatedby"=>Auth::user()->id,
            "updated_at"=>Carbon::now()
        ]);

        return redirect("/backend/education")->with('message', 'Save successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $items = Education::find($id);
        if(isset($items)) {
            $items->delete();
        }

        return redirect("/backend/education")->with('message', 'Delete successfully!');
    }
}
