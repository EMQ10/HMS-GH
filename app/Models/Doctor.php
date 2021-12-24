<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Hospital;

class Doctor extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    public $timestamps = true;
    protected $guarded = [];
    protected $hospitalID ;

    public function __construct(){      
        $this->hospitalID = session()->get('hospitalID');
    }

    public function department(){
        return $this->belongsTo(Department::class)->wherePivot('hospital_id', $this->hospitalID)->withPivot('hospital_id')->withTimestamps();
    }

    public function hospitals(){
        return $this->belongsToMany(Hospital::class)->wherePivot('hospital_id', $this->hospitalID)->withPivot('department_id');
    }

}
