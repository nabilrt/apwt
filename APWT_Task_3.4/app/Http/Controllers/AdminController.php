<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Doctor;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Admin.login');
    }

    public function adminlogin(Request $req){

        $req->validate([
            'username'=>'required',
            'pass'=>'required'
        ]);

        $username = $req->username;
        $password = $req->pass;

        $admin = Admin::whereRaw("BINARY admin_username = '$username'")->whereRaw("BINARY admin_pass = '$password'")->first();

        if($admin){

        $req->session()->put('admin_username',$username);
        return redirect()->route('admin_dashboard');

        }else{

            return 'Invalid username or password ' . $password;

        }


    }

    public function logout() {

        session()->forget('admin_username');
        return redirect()->route('admin_login');
    }

    public function dashboard(){

        return view('Admin.dashboard');
    }

    public function doctor_reg(){
        return view('Admin.create_doctor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        //
        $req->validate([
            'username' =>'required|max:10|alpha_dash',
            'pass'=>'required|max:15|alpha_num',
            'mail'=>'required|email:rfc',
            'name'=>'required',
            'dp'=>'required|mimes:png,jpg',
            'degree'=>'required|mimes:pdf',
            'contact'=>'required|numeric',
            'gender'=>'required|alpha',
            'dob'=>'required|date',
            'doc_type'=>'required'
        ]);

        if($req->hasFile('dp') && $req->hasFile('degree')){

            $req->dp->store('dp', 'public');
            $req->degree->store('degree', 'public');

        $doctor=new Doctor();
        $doctor->doctor_name=$req->name;
        $doctor->doctor_email=$req->mail;
        $doctor->doctor_phone=$req->contact;
        $doctor->doctor_username=$req->username;
        $doctor->doctor_pass=md5($req->password);
        $doctor->doctor_gender=$req->gender;
        $doctor->doctor_dob=$req->dob;
        $doctor->doctor_dp=$req->dp->hashName();
        $doctor->doctor_degree=$req->degree->hashName();
        $doctor->doctor_type=$req->doc_type;
        $doctor->save();



        return back()->with('msg','Registration Completed Successfully');

        }else{

            return back()->with('msg','Registration Unable To Complete');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    public function showUsers(){
        $doctor=Doctor::all();
        return view('Admin.manage_doctors')->with('doctors',$doctor);
    }

    public function showUser(Request $req){

        $doctor = Doctor::where('doctor_id',$req->id)->first();

        return view('Admin.show_doctor')->with('doctor',$doctor);

    }

    public function editUser(Request $req){

        $doctor = Doctor::where('doctor_id',$req->id)->first();

        return view('Admin.edit_doctor')->with('doctor',$doctor);

    }

    public function deleteUser(Request $req){

        $doctor = Doctor::where('doctor_id',$req->id)->first();
        $doctor->delete();
        return redirect()->route('manage_doctors');

    }

    public function updateProfile(Request $req) {

        $req->validate([
            'username' =>'required|max:10|alpha_dash',
            'pass'=>'required|max:15|alpha_num',
            'mail'=>'required|email:rfc',
            'name'=>'required',
            'contact'=>'required|numeric',
        ]);

        $doctor=Doctor::where('doctor_id',$req->d_id)->first();
        $doctor->doctor_name=$req->name;
        $doctor->doctor_email=$req->mail;
        $doctor->doctor_phone=$req->contact;
        $doctor->doctor_username=$req->username;
        $doctor->doctor_pass=md5($req->password);
        $doctor->save();

        return redirect()->route('manage_doctors');




    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
