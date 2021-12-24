<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hospital;


class Department extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $guarded = [];
 

    public function employees(){
        return $this->belongsToMany(Employee::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function hospital(){
        return $this->belongsTo(Hospital::class);
    }
}
