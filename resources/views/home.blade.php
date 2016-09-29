@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <passport-clients></passport-clients>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <passport-authorized-clients></passport-authorized-clients>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <passport-personal-access-tokens></passport-personal-access-tokens>
        </div>
    </div>
</div>
@endsection
