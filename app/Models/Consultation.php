<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function patients(){
        return $this->belongsTo(Visit::class);
    }

    public function visit(){
        return $this->belongsTo(Visit::class);
    }
}
