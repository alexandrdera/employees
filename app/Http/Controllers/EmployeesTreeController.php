<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
ini_set('max_execution_time', 900); //Увеличиваем минимально разрешенное время выполнения php скрипта

class EmployeesTreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        $employees = DB::table('employees AS e')
            ->select(
                        'e.id',
                        'e.parent_id',
                        'e.position',
                        'e.first_name',
                        'e.last_name',
                        'e.salary'
                    )
            ->get();
        return view('employees_tree', compact('employees'));

    }

    //Изменить начальника
    public function changeChief(Request $request){
        DB::table('employees')->where('id', $request->employee_id)->update(['parent_id' => $request->chief_id]); //переподчиняем
        return response()->json('ok');
    }

    // Возвращаем подчиненных начальника
    public function getSubEmployees(Request $request){
        $subemployees = DB::table('employees')
            ->select('id', 'position', 'first_name', 'last_name', 'salary')
            ->where('parent_id', $request->chief_id)->get();
        return response()->json($subemployees);
    }
}
