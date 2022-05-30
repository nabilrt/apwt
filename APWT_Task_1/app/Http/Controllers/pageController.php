<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{

    public function home(){
        return view('home');
    }

    public function medicines(){

        $med1=array(
            'Name'=>"Napa",
            'Purpose'=>"Headache",
            'Price'=>"38 Taka"
        );

        $med2=array(
            'Name'=>"Nexium 20",
            'Purpose'=>"Acidity",
            'Price'=>"70 Taka"
        );

        $med3=array(
            'Name'=>"Remicade",
            'Purpose'=>"Arthritis",
            'Price'=>"90 Taka"
        );

        return view('medicineList')->with('medicine1',$med1)
        ->with('medicine2',$med2)
        ->with('medicine3',$med3);

    }

    public function team(){

        return view('ourTeam');
    }

    public function about(){
        return view('aboutUs');
    }

    public function contact(){
        return view('contact');
    }

    public function showDetails(Request $req){

        $req->validate([
            'mail' =>'required',
            'name'=>'required',
            'info'=>'required'
        ]);

        return view('query')->with('name',$req->name)
        ->with('mail',$req->mail)
        ->with('info',str($req->info));

    }


}
