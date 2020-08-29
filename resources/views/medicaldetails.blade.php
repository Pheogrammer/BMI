@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Treatments Records</h5>
        </div>
    </div>
</div>
<br>
<form action="{{route('savemedics')}}" method="post">
    @csrf
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <input type="text" name="pid" value="{{$user->id}}" hidden>
                <div class="form-group">
                    <label for="my-input"> Name of Child :</label>
                    <input id="my-input" style="text-transform: capitalize;" value="{{$user->name}}" required class="form-control" type="text" name="name">
                </div>
                </div>
                <div class="col">

                    <div class="form-group">
                        <label for="my-input"> Age :</label>
                        <input id="my-input" value="
                        <?php $d1 = new DateTime($user->dateofbirth);
                        $d2 = new DateTime(date('Y-m-d'));
                        $interval = $d1->diff($d2);

                        $diffInMonths  = $interval->m; //4
                        $diffInYears   = $interval->y; //1
                        //
                        //

                     echo     $diffInYears.' Year(s) '.$diffInMonths.' Month(s)'; //4 ?>" required class="form-control" type="text" name="age">
                    </div>
                    </div>
                </div>
                    <br>
                    <div class="row">
                    <div class="col">

                        <div class="form-group">
                            <label for="my-input">  Sex :</label>
                            <input id="my-input" value="{{$user->gender}}" required class="form-control" type="text" name="sex">
                        </div>
                        </div>

                <div class="col">

                <div class="form-group">
                    <label for="my-input"> Date of Admission :</label>
                    <input id="my-input" max="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" required class="form-control" type="date" name="dateofadmission">
                </div>
                </div></div>
                <br>
                <div class="row">
                <div class="col">

                <div class="form-group">
                    <label for="my-input"> Name of Caregiver :</label>
                    <input id="my-input"  required class="form-control" type="text" name="nameofcaregiver">
                </div>
                </div>
                <div class="col">

                    <div class="form-group">
                        <label for="my-input"> Weight at admission :</label>
                        <input id="my-input" value="{{$weight->weight}}"  required class="form-control" type="text" name="weightatadmission">
                    </div>
                    </div>
            </div>
            <br>
            <div class="row">
                <div class="col">

                <div class="form-group">
                    <label for="my-input"> Target Weight (Kg) :</label>
                    <input id="my-input"   required class="form-control" type="text" name="targetweight">
                </div>
                </div>
                <div class="col">

                <div class="form-group">
                    <label for="my-input"> W/Hz Score :</label>
                    <input id="my-input"  required class="form-control" value="{{$whz}}" type="text" name="whz">
                </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col">
                Oedema :

                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="oedema" id="" value="yes"> Yes
                        <input class="form-check-input" type="radio" name="oedema" id="" value="no"> No

                    </label>
                </div>
                </div>
                <div class="col">
                Transfer Form :

                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="transfer" id="" value="OTC"> OTC
                        <input class="form-check-input" type="radio" name="transfer" id="" value="ITC"> ITC

                    </label>
                </div>
                <input type="text" name="wid" value="{{$weight->id}}" hidden>
                </div>
                <div class="col">
                    HIV Status :
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="hiv" id="" value="Positive"> Positive
                            <input class="form-check-input" type="radio" name="hiv" id="" value="Negative"> Negative

                        </label>
                    </div>
                    </div>
            </div>
                <br>
                <div class="row">


                <div class="col-md-4">
                    Readmission :

                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input"  type="checkbox" name="readmission" id="" value="yes">
                    </label>
                </div>

                </div>
                <div class="col">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            Returned Defaulter : <input  class="form-check-input" type="checkbox" name="returned" id="" value="yes">
                        </label>
                    </div>
                    </div>
            </div>
            <br>
            <div class="row">

                <div class="col">
                    <div class="form-group">
                        <label for="my-input"> MUAC :</label>
                        <input id="my-input"  required class="form-control" type="text" name="muac">
                    </div>
                </div>


            </div>
            <div class="row">

                <div class="col">


                <div class="form-group">
                    <label for="my-input">Others :</label>
                    <input id="my-input" required class="form-control" type="text" name="others">
                </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('patientrecords',[$user])}}" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</div>
</form>
@endsection
