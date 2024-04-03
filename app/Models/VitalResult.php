<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VitalResult extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "vital_results";

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
