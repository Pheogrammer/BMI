<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patient;
use App\weight;
use App\takenvaccine;
use App\treatment;
use App\vaccine;
use App\User;
use App\record;
use Illuminate\Support\Facades\Auth;

use PDF;

use Illuminate\Support\Facades\Hash;
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

return redirect()->route('patientrecords',[$request['id']]);


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

    public function users()
    {
        $users = User::orderBy('name','ASC')->get();
        return view('users',['user'=>$users]);
    }

    public function editstaff($id)
    {
        $users = User::where('id',$id)->first();
        return view('editstaff',['data'=>$users]);
    }

    public function saveuser(Request $request)
    {
        $data = User::where('id',$request['id'])->first();
        $data->name = $request['name'];
        $data->phone = $request['phone'];
        $data->type = $request['type'];
        $data->employeeID = $request['employeeid'];
        $data->save();

        return redirect()->route('users')->with(["message"=>"Staff Details Update Successfully "]);
    }

    public function staffregistration()
    {
        return view('staffregistration');
    }

    public function saveregistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|max:15|min:10',
            'email' => 'required|unique:users',

        ]);

        $resq = new User();
        $resq->name = $request['name'];
        $resq->email = $request['email'];
        $resq->phone = $request['phone'];
        $resq->password =  Hash::make($request['email']);
        $resq->type = $request['type'];
        $resq->employeeID = $request['employeeid'];
        $resq->save();

        return redirect()->route('users')->with(['message'=>'Staff Registered Successfully!']);
    }

    public function medicaldetails($id, $vid, $whz)
    {
        $uinfo = patient::where('id',$id)->first();
        $vinfo = weight::where('id',$vid)->first();
        $whz = $whz;

        return view('medicaldetails',['user'=>$uinfo,'weight'=>$vinfo,'whz'=>$whz]);
    }

    public function savemedics(Request $request)
    {
        $record = new record();
        $record->pid = $request['pid'];
        $record->date = date('Y-m-d');
        $record->whz = $request['whz'];
        $record->oedema = $request['oedema'];
        $record->muac = $request['muac'];
        $record->others = $request['others'];
        $record->weightaad = $request['weightatadmission'];
        $record->targetwkg = $request['targetweight'];
        $record->trForm = $request['transfer'];
        $record->hiv = $request['hiv'];
        if(is_null($request['readmission']))
        {

        }else{
            $record->readmission = $request['readmission'];
        }

        if(is_null($request['returned']))
        {

        }else{
            $record->returneddefaulter = $request['returned'];

        }
        $record->wid = $request['wid'];
        $record->care = $request['nameofcaregiver'];
        $record->save();

        $rec = weight::where('id',$request['wid'])->first();
        $rec->record = '1';
        $rec->save();

        return redirect()->route('patientrecords',[$request['pid']])->with(['message'=>'Records saved successfully']);
    }

    public function recordspdf($id, $vid, $whz)
    {
        $data['weight'] = weight::where('id',$vid)->first();
        $data['user'] = patient::where('id',$id)->first();
        $data['whz'] = $whz;
        $pdf = PDF::loadView('recordspdf',$data);
        return $pdf->stream('Patient Records'.''.date('d-m-Y Hi').'.pdf');
    }

    public function password()
    {
        return view('password');
    }

    public function passwordsave(Request $request)
    {
        $rules=[

              'old' => 'required',
              'new' => 'required',
              'confirm' => 'required|same:new'



          ];
          $error_messages=[

              'confirm.same'=>'Password did not Match. Try again.',


          ];
          $validator=  validator($request->all(), $rules, $error_messages);
          if ($validator->fails()) {
              return redirect()->back()
                          ->withErrors($validator)
                          ->withInput();
         }


          $user = User::find(auth()->user()->id);
          if (Hash::check($request['old'], Auth::User()->password)){
              $user->password = Hash::make($request['new']);
              $user->save();
              return redirect()->route('allpatients')->with(['message' => 'Password changed successfully']);
          }
          return redirect()->back()->withErrors(['message' => 'You entered the wrong old password']);
      }
}
