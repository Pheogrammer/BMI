@extends('layouts.app')
@section('title')
    Edit Record
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Edit Staff Details</div>
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
                        <form action="{{route('saveuser')}}" method="post">
                            @csrf
                            <input type="text" value="{{$data->id}}" name="id" hidden>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" value=" {{$data->name}}" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="number" value="{{$data->phone}}" name="phone" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">Type</label>
                                <select  name="type" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                                <option value="{{$data->type}}" selected>{{$data->type}}</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Employee ID</label>
                                <input type="text" value="{{$data->employeeID}}" name="employeeid" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{route('users')}}"  class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
