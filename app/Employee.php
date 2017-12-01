<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public function chief()
    {
        return $this->hasOne('App\Employee', 'id', 'parent_id');
    }

}
