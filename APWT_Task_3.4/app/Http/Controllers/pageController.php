<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    //
    public function home(){
        return view('home');
    }

    public function services(){
        return view('services');
    }

    public function about() {
        return view('about');
    }

    public function department(){
        return view('departments');
    }

    public function register(){
        return view('registration');
    }

    public function contact(){
        return view('contact');
    }

    public function contactSubmitted(Request $req){

        $req->validate([
            'mail'=>'required',
            'name'=>'required',
            'info'=>'required'
        ]);

        $mail = $req->mail;
        $name = $req->name;
        $info = $req->info;

        return view('contactSubmitted')->with('mail',$mail)->with('name',$name)->with('info',$info);


    }
}
