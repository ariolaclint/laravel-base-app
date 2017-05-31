@extends('layouts.app')

@section('content')
	<div class="mycontent">
		<div class="col-md-12 noPaddingLeftRight">
			<div class="col-md-3 noPaddingLeftRight">
				<h5><span class="glyphicon glyphicon-user"></span> User Management</h5>
			</div>
			<div class="col-md-9 noPaddingLeftRight">
				<a href="{{ url('auth/register') }}" class="pull-right alineHeight">
					 <span class="glyphicon glyphicon-plus"></span> Add User
				</a>
			</div>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Role</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{ $user->firstname }}</td>
					<td>{{ $user->lastname }}</td>
					<td>
						{{ HelperClass::getRoleName($user->role) }}
					</td>
					<td>
						@if($user->active)
							Active
						@else
							Inactive
						@endif
					</td>
					<td>
						<button class="btn btn-xs btn-primary">Edit</button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection