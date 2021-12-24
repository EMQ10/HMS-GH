<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Receptionist;

class Hospital extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $guarded = [];

    public function departments(){
        return $this->hasMany(Department::class);
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }


}
