<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "payment_types";

    public function visits(){
        return $this->hasMany(Visit::class);
    }
}
