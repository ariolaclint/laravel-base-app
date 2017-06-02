@extends('layouts.app')

@section('content')
<div class="mycontent">
    <div class="container">
        <div class="row">
             <div class="col-md-12 noPaddingLeftRight">
                <div class="col-md-3 noPaddingLeftRight">
                   <a class="alineHeight" href="{{ url('auth/users') }}">
                      <span class="glyphicon glyphicon-user"></span> User Management
                    </a>
                </div>
                <div class="col-md-9 noPaddingLeftRight">
                     <h5 class="pull-right"><span class="glyphicon glyphicon-plus"></span> Add User</h5>
                </div>
            </div>
            <div class="col-md-12 noPaddingLeftRight">
                <div class="panel panel-default">
                    <div class="panel-body paddingTop30">
                        <div class="col-md-12">
                                <center> <img height="120" width="120" src="{{ url('auth/profile/picture') }}/{{ $user->profilepic  }}" class="profilepic"  /></center>
                            </div>
                        <div class="col-md-8 col-md-offset-2">
                            <div class="col-md-6 noPaddingLeftRight"><span>Personal Information</span></div>
                            <div class="col-md-6 noPaddingLeftRight">
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="trTitle"><b>First name</b></td>
                                        <td>{{ $user->firstname }}</td>
                                        <td class="trTitle"><b>Last name</b></td>
                                        <td>{{ $user->lastname }}</td>
                                    </tr>
                                    <tr>
                                        <td class="trTitle"><b>Contact No.</b></td>
                                        <td>{{ $user->mobileno }}</td>
                                        <td class="trTitle"><b>E-mail</b></td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="trTitle"><b>Created Time</b></td>
                                        <td>{{ $user->created_at }}</td>
                                        <td class="trTitle"><b>Last Modified</b></td>
                                        <td>{{ $user->updated_at }}</td>
                                    </tr>
                                </tbody>
                            </table><br/>
                            <div class="col-md-6 noPaddingLeftRight"><span>Account Information</span></div>
                            <div class="col-md-6 noPaddingLeftRight">
                                <a id="modal-401542" href="#modal-container-401542" role="button"  data-toggle="modal" class="pull-right text-danger"><span class="glyphicon glyphicon-pencil"></span> Change Password</a>
                            </div>
                               <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="trTitle"><b>Username</b></td>
                                        <td>{{ $user->username }}</td>
                                        <td class="trTitle"><b>Password</b></td>
                                        <td>************</td>
                                    </tr>
                                    <tr>
                                        <td class="trTitle"><b>Status</b></td>
                                        <td>
                                            @if($user->active)
                                                Active
                                            @else
                                                Incative
                                            @endif
                                        </td>
                                        <td class="trTitle"><b>Role</b></td>
                                        <td>
                                            {{ HelperClass::getRoleName($user->role) }}
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
@include("users.modal.change-password")
@endsection
