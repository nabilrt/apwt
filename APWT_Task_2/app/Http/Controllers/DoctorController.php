<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    //static credentials for login
    public $cred=array(
        'uname'=>'nabil_an',
        'pass'=>'na123'
    );


    public function register(){
        return view('Doctor.register');
    }

    public function registerSubmit(Request $req){

        $req->validate([
            'username' =>'required|max:10|alpha_dash',
            'pass'=>'required|max:15|alpha_num',
            'mail'=>'required|email:rfc',
            'name'=>'required',
            'dp'=>'required|mimes:png,jpg',
            'degree'=>'required|mimes:pdf',
            'contact'=>'required|numeric',
            'gender'=>'required|alpha',
        ]);

        $email=$req->mail;
        $name=$req->name;
        $gender=$req->gender;
        $contact=$req->contact;

        return view('Doctor.registerSubmitted')->with('email',$email)
        ->with('name',$name)->with('gender',$gender)->with('contact',$contact);

    }

    public function login(){
        return view('Doctor.login');
    }

    public function dashboard(Request $req){

        $req->validate([
            'username'=>'required',
            'pass'=>'required'
        ]);

        $uname=$req->username;
        $password=$req->pass;

        if($uname==$this->cred['uname'] && $password==$this->cred['pass']){
            return view('Doctor.dashboard')->with('uname',$uname);
        }else{
            return redirect('Doctor.login');
        }
    }

    public function logout(){
        return view('Doctor.login');
    }




}
