<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patient;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function patientregister()
    {
        return view('register');
    }

    public function patientsave(Request $request)
    {
        $saving = new patient();
        $saving->name = $request['childname'];
        $saving->dateofbirth = $request['dateofbirth'];
        $saving->onbirthweight = $request['birthkg'];
        $saving->gram = $request['birthgm'];
        $saving->placeofbirth = $request['placeofbirth'];
        $saving->birthattendant = $request['attendantname'];
        $saving->nameofclinic = $request['clinicname'];
        $saving->mothername = $request['mothername'];
        $saving->fathername = $request['fathername'];
        $saving->phonenumber = $request['phonenumber'];
        $saving->residence = $request['residenceplace'];
        $saving->registeredby = auth()->user()->id;
        $saving->save();

        return redirect()->route('allpatients')->with(['message'=>'patient records saved successfully!']);

    }

    public function allpatients()
    {
        $patients = patient::orderby('name','asc')->get();
        return view('allpatients',['patient'=>$patients]);
    }

    public function patientrecords($id)
    {
        $records = patient::where('id',$id)->first();
        return view('patientrecords',['recs'=>$records]);
    }

    public function editpatient($id)
    {
        $records = patient::where('id',$id)->first();
        return view('editpatient',['recs'=>$records]);
    }

    public function patienteditsave(Request $request)
    {
        $saving = patient::where('id',$request['id'])->first();
        $saving->name = $request['childname'];
        $saving->dateofbirth = $request['dateofbirth'];
        $saving->onbirthweight = $request['birthkg'];
        $saving->gram = $request['birthgm'];
        $saving->placeofbirth = $request['placeofbirth'];
        $saving->birthattendant = $request['attendantname'];
        $saving->nameofclinic = $request['clinicname'];
        $saving->mothername = $request['mothername'];
        $saving->fathername = $request['fathername'];
        $saving->phonenumber = $request['phonenumber'];
        $saving->residence = $request['residenceplace'];
        $saving->registeredby = auth()->user()->id;
        $saving->save();

        return redirect()->route('allpatients')->with(['message'=>'patient records saved successfully!']);
    }
}
