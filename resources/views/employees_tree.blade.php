@extends('layouts.layout')

@section('content')
    <h2>Employees tree...</h2>
    <ul id="sortable">
        {{EmployeesTree($employees, null, 0)}}
    </ul>
@endsection

<?php

function EmployeesTree($array, $parent_id, $level) {

    foreach ($array as $employee) {

        if ($employee->parent_id == $parent_id) {
            
            echo '<li employee_id='.$employee->id.'> <b>'.$employee->position.'</b> - '.$employee->first_name.' '.$employee->last_name.', $'.round($employee->salary,-2);
            $level++;
            echo '<ul id="sortable">';

            if ($level < 2) {
                EmployeesTree($array, $employee->id, $level);
            }

            $level--;
            echo '</ul></li>';
        }
    }
}
?>

@push('scripts')
 <script>
  
$( function() {
    $( "#sortable" ).sortable({
        update: function (event, ui) {
            var employee = $(ui.item).attr("employee_id");
            var new_chief = $(ui.item).parent().parent().attr("employee_id");
            console.log(employee, new_chief);
            console.log('ok');

            $.ajax({
                type: 'put',
                url: 'change.chief',
                data: {
                    'employee_id': employee,
                    'chief_id': new_chief,
                    '_token': $('meta[name="csrf-token"]').attr('content')
                }
            });
        } 
    });
    
    $( "#sortable" ).disableSelection();
});

</script>
@endpush
