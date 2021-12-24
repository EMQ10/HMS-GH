<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $guarded = [];
   

    public function role(){
        return $this->hasOne(Role::class);
    }

    public function hospital(){
        return $this->belongsTo(Hospital::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

  }
