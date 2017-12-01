@extends('layouts.layout')

@section('content')
 
<div class="form-row">
	<div class="form-group col-md-2">
		<a class="btn btn-outline-success btn-sm" href="/employees/create">Create New</a>
	</div>
</div>

<table class="table table-bordered" id="employees-table">
	<thead class="table-dark">
		<tr>
			<th>ID</th>
			<th>Thumb</th>
			<th>Name</th>
			<th>Last name</th>
			<th>Patronomic</th>
			<th>Position</th>
			<th>Empl-nt date</th>
			<th>Salary</th>
			<th>Chief name</th>
			<th>Chief last name</th>
			<th>Chief position</th>
			<th>Action</th>
		</tr>
	</thead>
</table>
        
@stop

@push('scripts')
<script>
$(function() {
	
	//Обработка таблицы сотрудников средствами DataTables
    $('#employees-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'id', name: 'employees.id' },
            { 
            	data: 'thumb', 
            	name: 'employees.thumb',
        	    render: function ( data, type, row, meta ) {
			      return '<img src="'+data+'">';
			    },
			    searchable: false,
			    orderable: false
            },
            { data: 'first_name', name: 'employees.first_name' },
            { data: 'last_name', name: 'employees.last_name' },
            { data: 'patronomic', name: 'employees.patronomic' },
            { data: 'position', name: 'employees.position' },
            { data: 'employment_date', name: 'employees.employment_date' },
            { data: 'salary', name: 'employees.salary' },
            { data: 'chief_name', name: 'e2.first_name', searchable: false },
            { data: 'chief_last_name', name: 'e2.last_name', searchable: false },
            { data: 'chief_position', name: 'e2.position', searchable: false },

            //Вывод кнопок в колонке Action
            { 
            	data: 'id', 
            	name: 'Action',
            	searchable: false,
            	orderable: false,
        	    render: function ( data, type, row, meta ) {
			      return '<a href="/employees/'+data+'" class="btn btn-outline-secondary btn-sm"><img src="/open-iconic/svg/person.svg" alt="person"></a>		<a href="/employees/'+data+'/edit" class="btn btn-outline-secondary btn-sm"><img src="/open-iconic/svg/pencil.svg" alt="pencil"></a>		<button type="submit" class="btn btn-outline-secondary btn-sm delete_employee" id="'+data+'"><img src="/open-iconic/svg/x.svg" alt="x"></button>';
			    }            	
            }
       ]
    });

	// Обработка кнопки удаления сотрудника
	$("table").on( "click", ".delete_employee", function(){

		console.log('ok');
		var btn = $(this);
		var btn_id = btn.attr("id");

		$.ajax({
			type: "DELETE",
			url: "/employees/"+btn_id,
			data: {
				'id': btn_id, 
				'_token': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(data){
				btn.closest('tr').remove(); //Удаляем строку из таблицы
				console.log(data);
			}
		});
	});

});

</script>
@endpush
