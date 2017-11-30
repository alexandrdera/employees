<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Yajra\Datatables\Datatables;
use DB;

class DatatablesController extends Controller
{
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
        return Datatables(Employee::query())->toJson();
    }
}
