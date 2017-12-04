<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image as ImageInt;

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
            //'parent_id' => 'required',
            'position' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'patronomic' => 'required',
            'employment_date' => 'required',
            'salary' => 'required',
            'photo' => 'image|dimensions:max_width=500,max_height=500',

        ]);

        // Создание сотрудника
        $employee = new Employee();
        $employee->parent_id = $request->parent_id;
        $employee->position = $request->position;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->patronomic = $request->patronomic;
        $employee->employment_date = $request->employment_date;
        $employee->salary = $request->salary;

        // Подготовка изображений сотрудника
        $file = $request->file('photo');
        if ($file<>null) {
            $imagePath = 'upload/photo/';
            $thumbPath = 'upload/thumb/';

            $filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'png';
            $img = ImageInt::make($file);

            $img->resize(200,200)->save($imagePath . $filename);
            $img->resize(75,75)->save($thumbPath . $filename);
    
            $employee->photo = $imagePath . $filename;
            $employee->thumb = $thumbPath . $filename;
        }
        
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
            //'parent_id' => 'required',
            'position' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'patronomic' => 'required',
            'employment_date' => 'required',
            'salary' => 'required',
            'photo' => 'image|dimensions:max_width=500,max_height=500',

        ]);

        // Внесение изменений для сотрудника
        $employee = Employee::find($id);
        $employee->parent_id = $request->parent_id;
        $employee->position = $request->position;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->patronomic = $request->patronomic;
        $employee->employment_date = $request->employment_date;
        $employee->salary = $request->salary;

        // Подготовка изображений сотрудника
        $file = $request->file('photo');
        if ($file<>null) {
            $imagePath = 'upload/photo/';
            $thumbPath = 'upload/thumb/';

            $filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'png';
            $img = ImageInt::make($file);

            $img->resize(200,200)->save($imagePath . $filename);
            $img->resize(75,75)->save($thumbPath . $filename);
    
            $employee->photo = $imagePath . $filename;
            $employee->thumb = $thumbPath . $filename;
        }

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
    public function destroy(Request $request, $id)
    {
        //
        if($request->ajax()) {
            $employee = Employee::find($request->id);
            DB::table('employees')->where('parent_id', $id)->update(['parent_id' => $employee->parent_id]); //переподчиняем
            $data = "сотрудник удален: ".$request->id;
            $employee->delete();     
            return response()->json( $data );            
        } else {
            $employee = Employee::find($id);
            DB::table('employees')->where('parent_id', $id)->update(['parent_id' => $employee->parent_id]); //переподчиняем
            $employee->delete();        
            return redirect()->route('datatables');            
        } 
    }


    //Тест работы ajax
    public function getRequest(Request $req){
        $data = "test2";
        return response()->json( $data );
    }
}
