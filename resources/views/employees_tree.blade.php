@extends('layouts.layout')

@section('content')
    <h2>Employees tree...</h2>
    <ul>
        {{EmployeesTree($employees, null, 0)}}
    </ul>
@endsection

<?php

function EmployeesTree($array, $parent_id, $level) {

    foreach ($array as $employee) {

        if ($employee->parent_id == $parent_id) {
            
            echo '<li>'.'<b>'.$employee->position.'</b> - '.$employee->first_name.' '.$employee->last_name.', $'.round($employee->salary,-2);
            $level++;
            echo '<ul>';

            if ($level < 3) {
                EmployeesTree($array, $employee->id, $level);
            }

            $level--;
            echo '</ul></li>';
        }
    }
}
?>