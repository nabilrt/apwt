<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function register()
    {
        //
        return view('Doctor.register');
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

    public function login(){
        return view('Doctor.login');
    }

    public function loginRequest(Request $req){

        $req->validate([
            'username'=>'required',
            'pass'=>'required'
        ]);

        $username = $req->username;
        $password = $req->pass;

        /*$doctor = Doctor::whereRaw("BINARY doctor_username = '$username'")->first();

        $res=Hash::check($req->pass, $doctor->doctor_pass);

        if(!$doctor){
            return 'Invalid username or password';
        }
        if(!$res){
            return 'Invalid password ' .$res;
        }

        $req->session()->put('username',$username);
        return view('Doctor.dashboard'); */

        $doctor = Doctor::whereRaw("BINARY doctor_username = '$username'")->whereRaw("BINARY doctor_pass = '$password'")->first();

        if($doctor){

        $req->session()->put('username',$username);

        if($req->remember){
            setcookie('uname',$req->username, time()+20);
            setcookie('pass',$req->pass, time()+20);
            return redirect()->route('dashboard');
        }

        return redirect()->route('dashboard');

        }else{

            return 'Invalid username or password ' . $password;

        }




    }

    public function dashboard(){

        return view('Doctor.dashboard');
    }

    public function logout() {

        session()->forget('username');
        return redirect()->route('login');
    }

    public function loadProfile(Request $req) {

        $doctor=Doctor::where('doctor_username',session('username'))->first();

        return view('Doctor.profile')->with('doctor',$doctor);


    }

    public function editProfile(){

        $doctor=Doctor::where('doctor_username',session('username'))->first();

        return view('Doctor.edit_profile')->with('doctor',$doctor);

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

        return redirect()->route('profile');




    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorRequest  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
