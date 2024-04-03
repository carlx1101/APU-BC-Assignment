<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'uuid'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected function role(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["patient", "admin", "doctor"][$value],
        );
    }

    public function branchDoctors()
    {
        return $this->hasMany(BranchDoctor::class, 'doctor_id');
    }

    public function medicalHistory()
    {
        return $this->hasOne(MedicalHistory::class, 'patient_id');
    }

    public function medicationRecordsForPatient()
    {
        return $this->hasMany(MedicationRecord::class, 'patient_id');
    }

    public function medicationRecordsForDoctor()
    {
        return $this->hasMany(MedicationRecord::class, 'doctor_id');
    }

    public function allergies()
    {
        return $this->hasMany(Allergy::class, 'patient_id');
    }

    public function vitalsResults()
    {
        return $this->hasMany(VitalResult::class, 'patient_id');
    }

    public function laboratoryTestResultsForPatient()
    {
        return $this->hasMany(LabortoryTestResult::class, 'patient_id');
    }

    public function laboratoryTestResultsForDoctor()
    {
        return $this->hasMany(LabortoryTestResult::class, 'physician_attendant_id');
    }

    public function immunizationRecordsForPatient()
    {
        return $this->hasMany(ImmunizationRecord::class, 'patient_id');
    }

    public function immunizationRecordsForDoctor()
    {
        return $this->hasMany(ImmunizationRecord::class, 'immunization_provider_id');
    }

    public function clinicalNotesForDoctor()
    {
        return $this->hasMany(ClinicalNote::class, 'doctor_id');
    }

    public function clinicalNotesForPatient()
    {
        return $this->hasMany(ClinicalNote::class, 'Patient_id');
    }

    public function insuranceInformation()
    {
        return $this->hasOne(InsuranceInformation::class, 'patient_id');
    }
}
