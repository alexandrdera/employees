@extends('layouts.layout')

@section('content')

	<!-- Форма редактирования сотрудника -->
	{!! Form::model($employee, ['route' => ['employees.update', $employee->id], 'method' => 'PUT', 'files' => true]) !!}

		<!-- Загрузка фото сотрудника -->
		<div class="form-row">
			<div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }} col-md-4">
				{!! Form::label('photo', 'Photo:'); !!}
				<img src={{ '/'.$employee->photo }}>
			    {!! Form::file('photo', ['class' => 'form-control ', 'id' => 'photo', 'name' => 'photo', 'type' => 'file']); !!}
			</div>
		</div>

		<!-- ФИО -->
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

		<!-- Непосредсвенный начальник и должность сотрудника -->
		<div class="form-row">		
			<div class="form-group col-md-8">
			    {!! Form::label('parent_id', 'Chief:'); !!}
			    {!! Form::number('parent_id', null,	['class' => 'form-control']); !!}
			</div>

			<div class="form-group col-md-2">
			    {!! Form::label('position', 'Position:'); !!}
			    {!! Form::text('position', null, ['class' => 'form-control', 'placeholder' => 'Patronomic']); !!}
			</div>
		</div>

		<!-- Дата трудоустройства -->
		<div class="form-row">
			<div class="form-group col-md-4">			
				{!! Form::label('employment_date', 'Employment date:'); !!}
				{!! Form::date('employment_date', null, ['class' => 'form-control']); !!}		
			</div>
		</div>

		<!-- ЗП -->
		<div class="form-row">
			<div class="form-group col-md-4">			
				{!! Form::label('salary', 'Salary:'); !!}
				{!! Form::number('salary', null, ['class' => 'form-control']); !!}
			</div>
		</div>

		<!-- Кнопки -->
		<div class="form-row">
			<div class="form-group col-md-1">			
				{!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
				{!! Form::close() !!}
			</div>
			<div class="form-group col-md-1">			
				{!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'DELETE']) !!}
				{!! Form::submit('Delete', ['class' => 'btn btn-danger form-control']) !!}
				{!! Form::close() !!}
			</div>
		</div>

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
