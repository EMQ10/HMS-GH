<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;


class Vital extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function patient(){
        $this->belongsTo(Patient::class);
    }

    public function visit(){
        return $this->belongsTo(Visit::class);
    }
}
