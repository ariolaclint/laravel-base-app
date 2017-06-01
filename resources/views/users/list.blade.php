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
					<th>Contact No.</th>
					<th>E-mail</th>
					<th>Role</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td><a href="{{ url('auth/users') }}/{{ $user->id }}/view">
							{{ $user->firstname }}
						</a>
					</td>
					<td>{{ $user->lastname }}</td>
					<td>{{ $user->mobileno }}</td>
					<td>{{ $user->email }}</td>
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
						<a href="{{ url('auth/users') }}/{{ $user->id }}/edit">
							<button class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
						</a>
						<a class="delteuser" href="{{ url('auth/users') }}/{{ $user->id }}/delete">
							&nbsp<button class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<script type="text/javascript">
		$(function(){
			$(".delteuser").click(function(e){

				var r = confirm("Are you sure you want to delete this user?");
				if (r == false) {
				     e.preventDefault();
				} 
			})
		})
	</script>
@endsection