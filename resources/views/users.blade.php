@extends('layouts.app')
@section('title')
    All Patients Records
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">

                    All Staff Members Records
                        </div>
                        <div class="col text-right">
                            <a class="btn btn-primary" href="{{route('staffregistration')}}">Add New Staff</a>
                        </div>
                    </div>
                </div>
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

                   <table id="myTable" class="table table-striped display " style="width: 100%;">
                       <thead>
                           <tr>
                               <th>#</th>
                               <th>Name</th>
                               <th>Email</th>
                               <th>Phone</th>
                               <th>Type</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           @php
                               $d =1;
                           @endphp
                           @foreach ($user as $item)
                            <tr>
                                <td>{{$d}}</td>
                                <td style="text-transform: capitalize;">{{$item->name}}</td>
                                <td style="text-transform: capitalize;">{{$item->email}}</td>
                                <td style="text-transform: capitalize;">{{$item->phone}}</td>
                                <td style="text-transform: capitalize;">{{$item->type}}</td>
                                <td> <a title="View" href="{{route('editstaff',[$item->id])}}" class="btn btn-primary  @if (auth()->user()->id == $item->id)
                                    disabled
                                @endif"> <i class="fa fa-eye"></i> </a> </td>
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
