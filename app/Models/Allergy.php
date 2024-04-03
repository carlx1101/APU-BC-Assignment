<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "allergies";

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
