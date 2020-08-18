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
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            Name: {{$recs->name}}
                        </div>
                        <div class="col">
                            Date of Birth: {{$recs->dateofbirth}}
                        </div>

                        <div class="col">
                            Age: @php
                               //

                                $d1 = new DateTime($recs->dateofbirth);
                                $d2 = new DateTime(date('Y-m-d'));
                                $interval = $d1->diff($d2);

                                $diffInMonths  = $interval->m; //4
                                $diffInYears   = $interval->y; //1
                                //
                                //

                             echo     $diffInYears.' Year(s) '.$diffInMonths.' Month(s)'; //4

                            @endphp
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
                        <div class="col-md-4">
                            Weight: {{$recs->onbirthweight}}Kg
                        </div>
                        <div class="col-md-4">
                            Gender: {{$recs->gender}}
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
                    <a href="{{route('editpatient',[$recs->id])}}" class="btn btn-primary">Edit</a> <a href="{{route('allpatients')}}" class="btn btn-danger">Cancel</a>

                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container">
<div class="card">
    <div class="card-body">
        <a href="{{route('weight',[$recs->id])}}" class="btn btn-primary"> <i class="fas fa-weight    "></i> Weight</a>

            <a href="{{route('vaccines',[$recs->id])}}" class="btn btn-primary"> <i class="fas fa-syringe    "></i> Vaccines</a>

            <a href="{{route('plotteddata',[$recs->id])}}" class="btn btn-primary"> <i class="fas fa-chart-line    "></i> Graph</a>

    </div>
</div>
</div>
<br>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Title</h5>
                <table class="table stripe table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>Visit #</th>
                            <th>Date</th>
                            <th>Weight</th>
                            <th>Height</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $b = 0;
                        @endphp
                        @foreach ($weight as $item)
                        <tr>
                            @php
                                $b++;
                            @endphp
                            <td>{{$b}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->weight}} Kg</td>
                            <td>{{$item->height}} M</td>
                            <td></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
