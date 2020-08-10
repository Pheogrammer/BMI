@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
