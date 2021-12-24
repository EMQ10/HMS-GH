<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;


class Nurse extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $guarded = [];

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
