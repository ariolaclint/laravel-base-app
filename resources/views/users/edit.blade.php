@extends('layouts.app')

@section('content')
	<div class="mycontent">
		<div class="col-md-12 noPaddingLeftRight">
			<div class="col-md-3 noPaddingLeftRight">
				<a href="{{ url('auth/users') }}">
					<h5><span class="glyphicon glyphicon-user"></span> User Management</h5>
				</a>
			</div>
			<div class="col-md-9 noPaddingLeftRight">
				 <h5 class="pull-right"><span class="glyphicon glyphicon-pencil"></span> Edit  User</h5>
			</div>
		</div>
		  <div class="col-md-12 noPaddingLeftRight">
                <div class="panel panel-default">
                    <div class="panel-body paddingTop30">
                        <div class="col-md-8 col-md-offset-2">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('auth/users') }}/{{ $user->id }}">
                            {{ csrf_field() }}
                            <div class="col-md-12 noPaddingLeftRight detailviewheader">Personal Information</div>
                            		<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                        <label for="firstname" class="col-md-4 control-label">First Name</label>
                                        <div class="col-md-6">
                                            <?php $firstname_val = $user->firstname ?>
                                            @if(old('firstname'))
                                                <?php $firstname_val = old('firstname') ?>
                                            @endif

                                            <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $firstname_val }}" placeholder="First Name" required autofocus>

                                            @if ($errors->has('firstname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('firstname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                        <label for="lastname" class="col-md-4 control-label">Last Name</label>

                                        <div class="col-md-6">
                                            <?php $lastname_val = $user->lastname ?>
                                            @if(old('lastname'))
                                                <?php $lastname_val = old('lastname') ?>
                                            @endif

                                            <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $lastname_val }}" placeholder="Last Name" required>

                                            @if ($errors->has('lastname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('lastname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('mobileno') ? ' has-error' : '' }}">
                                        <label for="mobileno" class="col-md-4 control-label">Contact No.</label>

                                        <div class="col-md-6">
                                            <?php $mobileno_val = $user->mobileno ?>
                                            @if(old('mobileno'))
                                                <?php $mobileno_val = old('mobileno') ?>
                                            @endif

                                            <input id="mobileno" type="text" class="form-control" name="mobileno" value="{{ $mobileno_val }}" placeholder="Contact No." required>

                                            @if ($errors->has('mobileno'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('mobileno') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">E-mail</label>

                                        <div class="col-md-6">
                                            <?php $email_val = $user->email ?>
                                            @if(old('email'))
                                                <?php $email_val = old('email') ?>
                                            @endif

                                            <input id="email" type="text" class="form-control" name="email" value="{{ $email_val }}" placeholder="E-mail" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                        <label for="role" class="col-md-4 control-label">Role</label>

                                        <?php $role_val = $user->role ?>
                                        @if(old('role'))
                                            <?php $role_val = old('role') ?>
                                        @endif

                                        <div class="col-md-6">
                                            <select name="role" required class="form-control">
                                                @foreach(HelperClass::getAllRoles() as $roleid => $rolename)
                                                    @if($role_val == $roleid)
                                                        <option value="{{ $roleid }}" selected>{{ $rolename }}</option>
                                                    @else
                                                        <option value="{{ $roleid }}">{{ $rolename }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if ($errors->has('role'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('role') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
		                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
		                                <label for="role" class="col-md-4 control-label">Status</label>

		                                <?php $status = array("1" => "Active", "0" => "Inactive");  $active_val = $user->active ?>
		                                @if(old('role'))
		                                    <?php $active_val = old('active') ?>
		                                @endif

		                                <div class="col-md-6">
		                                    <select name="active" required class="form-control">
			                                    @foreach($status as $statid => $stat)
			                                    	@if($active_val == $statid)
			                                    		<option value="{{ $statid }}" selected>{{ $stat }}</option>
			                                    	@else
			                                    		<option value="{{ $statid }}">{{ $stat }}</option>
			                                    	@endif
			                                    @endforeach
		                                    </select>
		                                    @if ($errors->has('active'))
		                                        <span class="help-block">
		                                            <strong>{{ $errors->first('active') }}</strong>
		                                        </span>
		                                    @endif
		                                </div>
		                            </div>

		                            <div class="form-group">
		                                <div class="col-md-6 col-md-offset-4">
		                                    <button type="submit" class="btn btn-primary">
		                                        Update
		                                    </button>&nbsp
		                                     <a href="{{ url('auth/users') }}">
		                                        <button type="button" class="btn">
		                                            Cancel
		                                        </button>
		                                    </a>
		                                </div>
		                            </div>
		                        </form>
                        </div>
                    </div>
                </div>
            </div>
	</div>
@endsection