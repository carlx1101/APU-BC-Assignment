<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "medical_histories";

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
