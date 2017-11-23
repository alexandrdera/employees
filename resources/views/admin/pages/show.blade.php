@extends('layouts.layout')

@section('content')

<table class="table table-striped table-bordered table-sm">
	<thead class="table-dark">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Last name</th>
			<th>Patronomic</th>
			<th>Position</th>
			<th>Employment date</th>
			<th>Salary</th>
			<th>Chief name</th>
			<th>Chief last name</th>
			<th>Chief position</th>
		</tr>
	</thead>
	<tbody>
	    <tr>
			<th scope="row">{{ $employee->id }}</th>
			<td>{{ $employee->first_name }}</td>
			<td>{{ $employee->last_name }}</td>
			<td>{{ $employee->patronomic }}</td>
			<td>{{ $employee->position }}</td>
			<td>{{ $employee->employment_date }}</td>
			<td>{{ $employee->salary }}</td>
			@if ($chief <> null)
				<td>{{ $chief->first_name }}</td>
				<td>{{ $chief->last_name }}</td>
				<td>{{ $chief->position }}</td>
			@endif
	    </tr>    			
	</tbody>
</table>

@endsection