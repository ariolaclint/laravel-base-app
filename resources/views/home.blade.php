@extends('layouts.app')

@section('content')
<div class="mycontent">
    <div class="container">
        <div class="row">
            <div class="col-md-12 noPaddingLeftRight">
                <div class="col-md-3 noPaddingLeftRight">
                    <h5><span class="glyphicon glyphicon-dashboard"></span> Dashboard</h5>
                </div>
                <div class="col-md-9 noPaddingLeftRight">
                   <!-- Actions Links -->
                </div>
            </div>
            <div class="col-md-12 noPaddingLeftRight">
                <div class="panel panel-default">
                    <div class="panel-body">
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
