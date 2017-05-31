@extends('layouts.app')

@section('content')
<div class="mycontent">
    <div class="container">
        <div class="row">
            <div class="col-md-12 noPaddingLeftRight">
                <div class="col-md-3 noPaddingLeftRight">
                    <h5><span class="glyphicon glyphicon-user"></span> My Profile</h5>
                </div>
                <div class="col-md-9 noPaddingLeftRight">
                     <a href="{{ url('auth/profile/edit') }}" class="pull-right alineHeight">
                        <span class="glyphicon glyphicon-pencil"></span> Edit Profile
                    </a>
                </div>
            </div>
            <div class="col-md-12 noPaddingLeftRight">
                <div class="panel panel-default">
                    <div class="panel-body paddingTop30">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="col-md-6 noPaddingLeftRight"><span>Personal Information</span></div>
                            <div class="col-md-6 noPaddingLeftRight">
                               
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="trTitle"><b>First name</b></td>
                                        <td>{{ Auth::user()->firstname }}</td>
                                        <td class="trTitle"><b>Last name</b></td>
                                        <td>{{ Auth::user()->lastname }}</td>
                                    </tr>
                                    <tr>
                                        <td class="trTitle"><b>Contact No.</b></td>
                                        <td>{{ Auth::user()->mobileno }}</td>
                                        <td class="trTitle"><b>E-mail</b></td>
                                        <td>{{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="trTitle"><b>Created Time</b></td>
                                        <td>{{ Auth::user()->created_at }}</td>
                                        <td class="trTitle"><b>Last Modified</b></td>
                                        <td>{{ Auth::user()->updated_at }}</td>
                                    </tr>
                                </tbody>
                            </table><br/>
                            <div class="col-md-6 noPaddingLeftRight"><span>Account Information</span></div>
                            <div class="col-md-6 noPaddingLeftRight">
                                <a href="" class="pull-right text-danger"><span class="glyphicon glyphicon-pencil"></span> Change Password</a>
                            </div>
                               <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="trTitle"><b>Username</b></td>
                                        <td>{{ Auth::user()->username }}</td>
                                        <td class="trTitle"><b>Password</b></td>
                                        <td>************</td>
                                    </tr>
                                    <tr>
                                        <td class="trTitle"><b>Status</b></td>
                                        <td>
                                            @if(Auth::user()->active)
                                                Active
                                            @else
                                                Incative
                                            @endif
                                            <a href="" class="pull-right">Deactivate</a>
                                        </td>
                                        <td class="trTitle"><b>Role</b></td>
                                        <td>
                                            {{ HelperClass::getRoleName(Auth::user()->role) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
