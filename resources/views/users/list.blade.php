@extends('layouts.app')

@section('content')
	
	<table class="table">
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Role</th>
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
					<button>Edit</button>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection