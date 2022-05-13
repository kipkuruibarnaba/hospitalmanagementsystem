<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;


class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id()){
           if(Auth::user()->usertype== '0') {
               $doctors = doctor::all();
               return  view('user.home',compact('doctors'));
           } else {
               return  view('admin.home');
           }
        } else {
            return redirect()->back();
        }
    }

    public function index(){
        if(Auth::id()) {
            return redirect('home');
        } else{
            $doctors = doctor::all();
            return view('user.home',compact('doctors'));
        }
    }

    public  function  appointment(Request $request){
        $appointment = new Appointment;
        $appointment->name = $request->fullname;
        $appointment->email = $request->emailaddress;
        $appointment->date = $request->date;
        $appointment->doctor = $request->doctorname;
        $appointment->phone = $request->phonenumber;
        $appointment->message = $request->message;
        // $appointment->status = 0;
         if(Auth::id()){
        $appointment->user_id = Auth::user()->id;
          }
        $appointment->save();
        return redirect()->back()->with('message', 'Appointment Placed Succesfully');
  
      }
}
