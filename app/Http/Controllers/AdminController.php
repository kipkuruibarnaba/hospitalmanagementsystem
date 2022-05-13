<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class AdminController extends Controller
{
    public  function  add_doctor_view(){
        return view('admin.add_doctor');
    }
    public  function  upload_doctor(Request $request){

      $image = $request ->file;
      $imagename = time(). '.'.$image ->getClientoriginalExtension();
      $request->file->move('doctorimages', $imagename);

      $doctor = new Doctor;
      $doctor->name = $request->doctorname;
      $doctor->phonenumber = $request->phonenumber;
      $doctor->speciality = $request->speciality;
      $doctor->roomnumber = $request->roomnumber;
      $doctor->image = $imagename;
      $doctor->save();
      return redirect()->back();

    }
}
