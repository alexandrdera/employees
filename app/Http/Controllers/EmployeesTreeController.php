<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        $tree = DB::table('employees_tree AS et')
            ->select(
                        'e1.first_name AS lvl_1',
                        'e2.first_name AS lvl_2',
                        'e3.first_name AS lvl_3',
                        'e4.first_name AS lvl_4',
                        'e5.first_name AS lvl_5',
                        'e6.first_name AS lvl_6',
                        'e7.first_name AS lvl_7'
                    )
                ->leftJoin('employees as e1', 'e1.id', '=', 'et.emp_id_lvl_1')
                ->leftJoin('employees as e2', 'e2.id', '=', 'et.emp_id_lvl_2')
                ->leftJoin('employees as e3', 'e3.id', '=', 'et.emp_id_lvl_3')
                ->leftJoin('employees as e4', 'e4.id', '=', 'et.emp_id_lvl_4')
                ->leftJoin('employees as e5', 'e5.id', '=', 'et.emp_id_lvl_5')
                ->leftJoin('employees as e6', 'e6.id', '=', 'et.emp_id_lvl_6')
                ->leftJoin('employees as e7', 'e7.id', '=', 'et.emp_id_lvl_7')
            ->get();

        return view('employees_tree', compact('tree'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
