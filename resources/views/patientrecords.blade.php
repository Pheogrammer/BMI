@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Patient Details</div>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ Session::get('message') }}</li>
                        </ul>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="alert alert-danger" style="list-style: none;">
                            @foreach ($errors->all() as $error)
                                <li><?php echo $error; ?></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            Name: {{$recs->name}}
                        </div>
                        <div class="col">
                            Date of Birth: {{$recs->dateofbirth}}
                        </div>

                        <div class="col">
                            Age: {{$recs->age}}
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            Place of birth: {{$recs->placeofbirth}}
                        </div>
                        <div class="col">
                            Clinic Name: {{$recs->nameofclinic}}
                        </div>

                        <div class="col">
                            Attendant Name: {{$recs->birthattendant}}
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            Weight: {{$recs->onbirthweight}}Kg
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            Mother's Name: {{$recs->mothername}}
                        </div>
                        <div class="col">
                            Father's Name: {{$recs->fathername}}
                        </div>

                        <div class="col">
                            Phone Number: {{$recs->phonenumber}}
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            Residence: {{$recs->residence}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{route('editpatient',[$recs->id])}}" class="btn btn-secondary">Edit</a> <a href="{{route('allpatients')}}" class="btn btn-danger">Cancel</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
