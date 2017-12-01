<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Yajra\Datatables\Datatables;
use DB;

class DatatablesController extends Controller
{
	// Ограничениен доступа для не аутентифицированных пользователей
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('employee');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
    	//Обращение к таблице через Eloquent ORM
    	//return datatables()->of(Employee::query())->toJson();			//работает быстро
        //return Datatables()->eloquent(Employee::query())->toJson();	//работает быстро
        //return Datatables(Employee::query())->toJson();				//работает быстро

    	//Обращение к таблице через Fluent Query Builder
    	// return datatables()->of(DB::table('employees'))->toJson();	//работает быстро
		// return datatables()->query(DB::table('employees'))->toJson();//работает быстро
		// return datatables(DB::table('employees'))->toJson();			//работает быстро

    	//Обращение к таблице через Collection 
		// return datatables()->of(Employee::all())->toJson();			//работает медленно
		// return datatables()->collection(Employee::all())->toJson();	//работает медленно
		// return datatables(Employee::all())->toJson();				//работает медленно

		//return datatables(DB::select('select * from employees'))->toJson();	//сырой запрос работает медленно

    	//DataTables Eloquent - leftJoin
        $employees = DB::table('employees')
        	->leftJoin('employees as e2', 'employees.parent_id', '=', 'e2.id')
            ->select([
		            	'employees.id',
		            	'employees.thumb',
		            	'employees.first_name',
		            	'employees.last_name',
		            	'employees.patronomic',
		            	'employees.position',
		            	'employees.employment_date',
		            	'employees.salary',
		            	'e2.first_name as chief_name',
		            	'e2.last_name as chief_last_name',
		            	'e2.position as chief_position'
        	    	 ]);

        return Datatables::of($employees)->make(true);
    	
    }
}
