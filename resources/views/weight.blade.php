@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Weight & Height Scale</h5>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <p class="card-text">
                <div class="row container">
                    <form action="{{route('saveweight')}}" method="post">
                        @csrf
                        <div class="input-group">
                        <input type="text" name="id" value="{{$data['id']}}" hidden>
                            <div class="input-group-append">
                                <span class="input-group-text" id="my-addon">Weight</span>
                            </div>
                            <input class="form-control" name="kilo" min="0" type="number" name="" placeholder="kilograms" aria-label="Recipient's " aria-describedby="my-addon">
                            <input class="form-control" name="gram" max="999" min="0" type="number" name="" placeholder="grams" aria-label="Recipient's " aria-describedby="my-addon">
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text" id="my-addon">Height</span>
                            </div>
                            <input class="form-control" name="height" min="1" type="text" name="" placeholder="Height (Meters)" aria-label="Recipient's " aria-describedby="my-addon">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </p>
        </div>
    </div>
</div>
@endsection
