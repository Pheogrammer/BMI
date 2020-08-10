@extends('layouts.app')
@section('title')
    Register New Record
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
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
                <div class="card-header">New Registration</div>

                <div class="card-body">
                <form action="{{route('patientsave')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="">Child's Name</label>
                      <input type="text" name="childname" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">Date of Birth</label>
                        <input type="date" name="dateofbirth" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="">On Birth Weight</label>
                        <div class="row">
                            <div class="col">
                                <input type="number" min="0" placeholder="kilogram" name="birthkg"  id="" class="form-control" placeholder="" required aria-describedby="helpId">

                            </div>
                            <div class="col">
                                <input type="number" min="0" max="999" placeholder="gram" name="birthgm" id="" class="form-control" placeholder="" required aria-describedby="helpId">

                            </div>
                        </div>

                      </div>
                      <div class="form-group">
                        <label for="">Place of birth</label>
                        <input type="text" name="placeofbirth" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="">Birth Attendant Name</label>
                        <input type="text" name="attendantname" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="">Name of Clinic</label>
                        <input type="text" name="clinicname" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="">Mother's Name</label>
                        <input type="text" name="mothername" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="">Father's Name</label>
                        <input type="text" name="fathername" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="number" name="phonenumber" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="">Current Residence Place</label>
                        <input type="text" name="residenceplace" id="" class="form-control" placeholder="" required aria-describedby="helpId">
                      </div>
                      <button type="submit" class="btn btn-secondary">Submit</button>
                      <button type="reset" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
