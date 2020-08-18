<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patient;
use App\weight;
use App\takenvaccine;
use App\treatment;
use App\vaccine;

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
        $saving->gender = $request['gender'];
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
        $weight = weight::where('p_id',$id)->orderBy('id','ASC')->get();
        return view('patientrecords',['recs'=>$records,'weight'=>$weight]);
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
        $saving->gender = $request['gender'];
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

    public function weight($id)
    {
        $saving = patient::where('id',$id)->first();
        return view('weight',['data'=>$saving]);
    }

    public function saveweight(Request $request)
    {
        $save = new weight();
        $save->weight = $request['kilo'].'.'.$request['gram'];
        $save->height = $request['height'];
        $save->p_id = $request['id'];
        $save->save();

return redirect()->route('plotteddata',[$request['id']]);


    }

// public function plotteddate($id)
// {

// }

    public function vaccines($id)
    {
        $v = vaccine::orderBy('name','ASC')->get();
        return view('vaccines',['p'=>$id,'v'=>$v]);
    }

    public function savevaccine(Request $request)
    {
        $new = new takenvaccine();
        $new->pid = $request['pid'];
        $new->vid = $request['vid'];
        $new->gid = auth()->user()->id;
        $new->next = $request['next'];
        $new->save();

        return redirect()->back();
    }


}
