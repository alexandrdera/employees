@extends('layouts.layout')

@section('content')
    
<h2>Employee...</h2>

<div class="row">
	<div class="col-auto mr-auto">
		<a class="btn btn-outline-success btn-sm" href="/employees/create">Create New</a>
	</div>
	<div class="col-auto">
		{!! Form::open(['route' => 'search_var', 'method' => 'GET']) !!}
			<div class="form-group">
				{!! Form::text('search_var', null, ['class' => '', 'placeholder' => 'Search']) !!}
				{!! Form::submit('Search', ['class' => 'btn btn-outline-info btn-sm']) !!}
			</div>
		{!! Form::close() !!}
	</div>
</div>

<table class="table table-striped table-bordered table-sm">
	<caption>List of employees {{ $employees->links() }}</caption>
	<thead class="table-dark">
		<tr>
			<th><a href="/employees/order_by/id">ID</a></th>
			<th><a href="/employees/order_by/first_name">Name</a></th>
			<th><a href="/employees/order_by/last_name">Last name</a></th>
			<th><a href="/employees/order_by/patronomic">Patronomic</a></th>
			<th><a href="/employees/order_by/position">Position</a></th>
			<th><a href="/employees/order_by/employment_date">Employment date</a></th>
			<th><a href="/employees/order_by/salary">Salary</a></th>
			<th><a href="/employees/order_by/chief_name">Chief name</a></th>
			<th><a href="/employees/order_by/chief_last_name">Chief last name</a></th>
			<th><a href="/employees/order_by/chief_position">Chief position</a></th>
			<th>Action</th>
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
			<td>
				<a href="/employees/{{ $employee->id }}">Read</a>
				<a href="{{ URL::to('/employees/' . $employee->id) .'/edit' }}">Edit</a>
				<form>

					<button type="submit" class="btn btn-danger" id="{{$employee->id}}">Delete</button>
				</form>
			</td>
	    </tr>    			
	@endforeach
	</tbody>
</table>
        
@endsection
