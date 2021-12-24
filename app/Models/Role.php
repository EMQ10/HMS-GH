<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $guarded = [];

    public const IS_ADMIN = 1;
    public const IS_DOCTOR = 2;
    public const IS_NURSE = 3;
    public const IS_RECEPTIONIST = 4;
    public const IS_SUPER_ADMIN = 5;
 
    // public function users(){
    //     return $this->hasMany(User::class);
    // }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }
}
