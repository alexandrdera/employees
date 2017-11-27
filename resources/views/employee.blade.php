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
				{!! Form::submit('Search', ['class' => 'btn btn-outline-secondary btn-sm']) !!}
			</div>
		{!! Form::close() !!}
	</div>
</div>

<table class="table table-striped table-bordered table-sm">
	<caption>List of employees {{ $employees->links() }}</caption>
	<thead class="table-dark">
		<tr>
			<th><a href="/employees/order_by/id">ID</a></th>
			<th>Thumb</th>
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
			<td><img src={{ '/'.$employee->thumb }}></td>
			<td>{{ $employee->first_name }}</td>
			<td>{{ $employee->last_name }}</td>
			<td>{{ $employee->patronomic }}</td>
			<td>{{ $employee->position }}</td>
			<td>{{ $employee->employment_date }}</td>
			<td>{{ $employee->salary }}</td>
			<td>{{ $employee->chief_name }}</td>
			<td>{{ $employee->chief_last_name }}</td>
			<td>{{ $employee->chief_position }}</td>
			<td class="action_column">
				<a href="/employees/{{ $employee->id }}" class="btn btn-outline-secondary btn-sm">
					<img src="/open-iconic/svg/person.svg" alt="person">
				</a>
				<a href="{{ URL::to('/employees/' . $employee->id) .'/edit' }}" class="btn btn-outline-secondary btn-sm">
					<img src="/open-iconic/svg/pencil.svg" alt="pencil">
				</a>
				<button type="submit" class="btn btn-outline-secondary btn-sm delete_employee" id="{{$employee->id}}">
					<img src="/open-iconic/svg/x.svg" alt="x">
				</button>
			</td>
	    </tr>    			
	@endforeach
	</tbody>
</table>
        
@endsection
