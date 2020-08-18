@extends('layouts.app')
@section('title')
    Edit Record
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Staff Registration</div>
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
                        <p class="text-primary">Default Password To New Staff Is His/Her Email<p>
                        <form action="{{route('saveregistration')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="number" name="phone" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email"  name="email" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">Type</label>
                                <select  name="type" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                                    <option value="user">Staff</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Employee ID</label>
                                <input type="text"  name="employeeid" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('users')}}"  class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
