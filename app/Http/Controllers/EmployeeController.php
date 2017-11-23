<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $sort_by=null)
    { 
        $dir = 'asc';

        if (is_null($sort_by)){
            $sort_by = 'id';
        } 
        
        $employees = DB::table('employees AS e')
            ->select(
                        'e.id',
                        'e.position',
                        'e.first_name',
                        'e.last_name',
                        'e.patronomic',
                        'e.employment_date',
                        'e.salary',
                        'e2.first_name as chief_name',
                        'e2.last_name as chief_last_name',
                        'e2.position as chief_position'
                    )
            ->leftjoin('employees AS e2', 'e2.id', '=' , 'e.parent_id')
            ->orderBy(''.$sort_by.'',''.$dir.'')
            ->paginate(100);
        return view('employee', compact('employees'));

    }

    public function search()
    {

        $search = Input::get('search_var');

        if (is_null($search)) {
            return redirect('/employees');
        } else { 
            $employees = DB::table('employees AS e')
                ->select(
                            'e.id',
                            'e.position',
                            'e.first_name',
                            'e.last_name',
                            'e.patronomic',
                            'e.employment_date',
                            'e.salary',
                            'e2.first_name as chief_name',
                            'e2.last_name as chief_last_name',
                            'e2.position as chief_position'
                        )
                ->leftjoin('employees AS e2', 'e2.id', '=' , 'e.parent_id')
                ->where('e.id', '=', ''.$search.'')
                ->orwhere('e.position', '=', ''.$search.'')
                ->orwhere('e.first_name', '=', ''.$search.'')
                ->orwhere('e.last_name', '=', ''.$search.'')
                ->orwhere('e.patronomic', '=', ''.$search.'')
                ->orwhere('e.employment_date', '=', ''.$search.'')
                ->orwhere('e.salary', '=', ''.$search.'')
                ->orwhere('e2.first_name', '=', ''.$search.'')
                ->orwhere('e2.last_name', '=', ''.$search.'')
                ->orwhere('e2.position', '=', ''.$search.'')
                ->paginate(100);
    
            return view('employee', compact('employees'));        
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.create');
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
        $this->validate($request, [
            'parent_id' => 'required',
            'position' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'patronomic' => 'required',
            'employment_date' => 'required',
            'salary' => 'required',
        ]);

        $employee = new Employee();
        $employee->parent_id = $request->parent_id;
        $employee->position = $request->position;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->patronomic = $request->patronomic;
        $employee->employment_date = $request->employment_date;
        $employee->salary = $request->salary;
        
        $employee->save();
        
        $request->session()->flash('message', 'Employee was created!');

        return redirect()->route('employees.show', $employee->id);
        
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
        $employee = Employee::find($id);

        // Проверка на наличие начальника
        if ($employee->parent_id <> null){
            $chief = Employee::find($employee->parent_id);    
        } else {
            $chief = null;
        }

        return view('admin.pages.show', compact('employee', 'chief'));
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
        $employee = Employee::find($id);

        // Проверка на наличие начальника
        if ($employee->parent_id <> null){
            $chief = Employee::find($employee->parent_id);    
        } else {
            $chief = null;
        }        

        $employee = compact('employee', 'chief');
        //return dd($employee);
        return view('admin.pages.edit', $employee);
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
        $this->validate($request, [
            'parent_id' => 'required',
            'position' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'patronomic' => 'required',
            'employment_date' => 'required',
            'salary' => 'required',
        ]);

        $employee = Employee::find($id);
        $employee->parent_id = $request->parent_id;
        $employee->position = $request->position;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->patronomic = $request->patronomic;
        $employee->employment_date = $request->employment_date;
        $employee->salary = $request->salary;
        
        $employee->save();
        
        $request->session()->flash('message', 'Employee was updated!');

        return redirect()->route('employees.show', $employee->id);

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
        $employee = Employee::find($id);
        $employee->delete();     
        
        return redirect()->route('employees.index');

    }
}
