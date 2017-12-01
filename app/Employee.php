<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public function chief()
    {
    	// Модель отношения "у каждого работника - один начальник",
    	// дает возможность обращатся к начальнику сотрудника,
    	// через Employee::find($id)->chief;
        return $this->hasOne('App\Employee', 'id', 'parent_id');
    }

}
