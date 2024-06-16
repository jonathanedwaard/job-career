<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JobSpecialization;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = User::all();
        return view('backend.masterdata.user.table', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.masterdata.user.user');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function registerView()
    {
        $items = JobSpecialization::all();
        return view('backend.register', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            "name"=>"required | min:5",
            "email"=>"required | email",
            "password"=>"required | min:8",
            "dob"=>"required"
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        User::insert([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password),
            "dateofbirth"=>$request->dob,
            "jobspecialization"=>0,
            "role"=>"Admin",
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now()
        ]);

        return redirect("/backend/user")->with('message', 'Save successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        $rules = [
            "name"=>"required | min:5",
            "email"=>"required | email | unique:users",
            "password"=>"required | min:8",
            "jobspecialization"=>"required",
            "dob"=>"required"
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        User::insert([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password),
            "dateofbirth"=>$request->dob,
            "jobspecialization"=>$request->jobspecialization,
            "role"=>"User",
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now()
        ]);

        return redirect("/");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $items = User::find($id);
        return view("backend.masterdata.user.userdetail", compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            "name"=>"required | min:5",
            "email"=>"required | email",
            "password"=>"required | min:8",
            "dob"=>"required"
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $isactive = $request->has('isactive') ? 'Y' : 'N';

        User::where("id", $id)->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password),
            "dateofbirth"=>$request->dob,
            "isactive"=>$isactive,
            "updated_at"=>Carbon::now()
        ]);

        return redirect("/backend/user")->with('message', 'Save successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Show the login page.
     */
    public function login()
    {
        return view("backend.login");
    }

    /**
     * Logout Authentication.
     */
    public function logout() {
        Auth::logout();
        return redirect("/");
    }

    /**
     * Authenticate the user with email and password.
     */
    public function authenticate(Request $request)
    {
        $credential = [
            "email" => $request->email,
            "password" => $request->password
        ];

        $rules = [
            "email"=>"required",
            "password"=>"required",
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        if(Auth::attempt($credential)) {
            return redirect("/");
        }
        return redirect("/backend/login");
    }
}
