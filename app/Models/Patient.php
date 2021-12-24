<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Patient extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function visits(){
        return $this->hasMany(Visit::class);
    }

    public function vitals(){
        return $this->hasManyThrough(Vital::class, Visit::class);
    }

    // public function vitals(){
    //     return $this->hasMany(Vital::class);
    // }
}
