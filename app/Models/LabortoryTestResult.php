<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabortoryTestResult extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "labortory_test_results";

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function physician()
    {
        return $this->belongsTo(User::class, 'physician_attendant_id');
    }
}
