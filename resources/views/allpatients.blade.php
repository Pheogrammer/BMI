@extends('layouts.app')
@section('title')
    All Patients Records
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">All Patients Records</div>
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

                   <table id="myTable" class="table table-striped display" style="width: 100%;">
                       <thead>
                           <tr>
                               <th>#</th>
                               <th>Name</th>
                               <th>Date of Birth</th>
                               <th>Place of Birth</th>
                               <th>Mother's Name</th>
                               <th>Father's Name</th>
                               <th>Phone Number</th>
                               <th>Residence </th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           @php
                               $d =1;
                           @endphp
                           @foreach ($patient as $item)
                            <tr>
                                <td>{{$d}}</td>
                                <td style="text-transform: capitalize;">{{$item->name}}</td>
                                <td><?php $time = strtotime($item->dateofbirth); echo date('d/m/Y',$time);  ?></td>
                                <td style="text-transform: capitalize;">{{$item->placeofbirth}}</td>
                                <td style="text-transform: capitalize;">{{$item->mothername}}</td>
                                <td style="text-transform: capitalize;">{{$item->fathername}}</td>
                                <td>{{$item->phonenumber}}</td>
                                <td style="text-transform: capitalize;">{{$item->residence}}</td>
                                <td> <a title="View" href="{{route('patientrecords',[$item->id])}}" class="btn btn-primary"> <i class="fa fa-eye"></i> </a> </td>
                            </tr>
                            @php
                                $d++;
                            @endphp
                           @endforeach

                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
