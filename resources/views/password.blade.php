@extends('layouts.app')
@section('title')
    Edit Record
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Change Password</div>
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
                        <form action="{{route('passwordsave')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Old Password</label>
                                <input required type="password" name="old" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">New Password</label>
                                <input required type="password" name="new" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input required type="password" name="confirm" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{route('allpatients')}}"  class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
