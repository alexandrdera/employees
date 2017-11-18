@extends('layouts.layout')

@section('content')
    
<h2>Employee...</h2>

{{ Form::open(['route' => 'search_var', 'method' => 'GET']) }}
	<div class="form-group">
		{{ Form::text('search_var', null, ['class' => '', 'placeholder' => 'Search'])}}
		{{ Form::submit('Search') }}
	</div>
{{ Form::close() }}

<table class="table table-striped table-bordered table-sm">
	<caption>List of employees {{ $employees->links() }}</caption>
	<thead class="table-dark">
		<tr>
			<th><a href="/employees/id">ID</a></th>
			<th><a href="/employees/first_name">Name</a></th>
			<th><a href="/employees/last_name">Last name</a></th>
			<th><a href="/employees/patronomic">Patronomic</a></th>
			<th><a href="/employees/position">Position</a></th>
			<th><a href="/employees/employment_date">Employment date</a></th>
			<th><a href="/employees/salary">Salary</a></th>
			<th><a href="/employees/chief_name">Chief name</a></th>
			<th><a href="/employees/chief_last_name">Chief last name</a></th>
			<th><a href="/employees/chief_position">Chief position</a></th>
		</tr>
	</thead>
	<tbody>
    @foreach ($employees as $employee)
	    <tr>
			<th scope="row">{{ $employee->id }}</th>
			<td>{{ $employee->first_name }}</td>
			<td>{{ $employee->last_name }}</td>
			<td>{{ $employee->patronomic }}</td>
			<td>{{ $employee->position }}</td>
			<td>{{ $employee->employment_date }}</td>
			<td>{{ $employee->salary }}</td>
			<td>{{ $employee->chief_name }}</td>
			<td>{{ $employee->chief_last_name }}</td>
			<td>{{ $employee->chief_position }}</td>
	    </tr>    			
	@endforeach
	</tbody>
</table>
        
@endsection
