<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;


class Visit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function vital(){
        return $this->hasOne(Vital::class);
    }
    public function consultation(){
        return $this->hasOne(Consultation::class);
    }

    public function visitType(){
        return $this->belongsTo(VisitType::class);
    }

    public function paymentType(){
        return $this->belongsTo(PaymentType::class);
    }
    public function nurse(){
        return $this->belongsTo(Employee::class);
    }
    public function doctor(){
        return $this->belongsTo(Employee::class);
    }
}
