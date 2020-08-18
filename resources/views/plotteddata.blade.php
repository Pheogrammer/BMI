@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Child's Growth Chart</h5>
        <p class="card-text">Name: {{$patient['name']}}</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div>

            </div>
        </div>
    </div>
</div>
@endsection
