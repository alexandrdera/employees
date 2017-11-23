@extends('layouts.layout')

@section('content')

	<!-- Форма создания сотрудника -->
	{!! Form::open(['route' => 'employees.store', 'method' => 'POST']) !!}
		<div class="form-row">	
			<div class="form-group col-md-4">
			    {!! Form::label('first_name', 'First name:'); !!}
			    {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First name']); !!}
			</div>
			<div class="form-group col-md-4">
			    {!! Form::label('last_name', 'Last name:'); !!}
			    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last name']); !!}
			</div>
			<div class="form-group col-md-4">
			    {!! Form::label('patronomic', 'Patronomic:'); !!}
			    {!! Form::text('patronomic', null, ['class' => 'form-control', 'placeholder' => 'Patronomic']); !!}
			</div>
		</div>

		<div class="form-row">		
			<div class="form-group col-md-8">
			    {!! Form::label('parent_id', 'Chief:'); !!}
			    {!! Form::number('parent_id', null,	['class' => 'form-control']); !!}
			</div>

			<div class="form-group col-md-2">
			    {!! Form::label('position', 'Position:'); !!}
			    {!! Form::select('position', [
			    		'ceo' => 'CEO',
			    		'Director' => 'Director',
			    		'Vice presedent' => 'Vice presedent',
			    		'Chief' => 'Chief',
			    		'Depty chief' => 'Depty chief',
			    		'Head of the sector' => 'Head of the sector',
			    		'worker' => 'Worker'
			    	]
			    	, null
			    	, ['placeholder' => 'Pick a position...']
			    	); !!}
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-4">			
				{!! Form::label('employment_date', 'Employment date:'); !!}
				{!! Form::date('employment_date', \Carbon\Carbon::now(), ['class' => 'form-control']); !!}		
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-4">			
				{!! Form::label('salary', 'Salary:'); !!}
				{!! Form::number('salary', 0, ['class' => 'form-control']); !!}
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-1">			
				{!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
			</div>
		</div>

	{!! Form::close() !!}

	<!-- Валидация введенных данных -->
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

@endsection
