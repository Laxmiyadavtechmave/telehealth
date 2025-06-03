<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Doctor extends Model
{
    use SoftDeletes;
    protected $fillable = ['doctor_id', 'name', 'email', 'img', 'clinic_id', 'password', 'gender', 'marital_status', 'phone', 'address1', 'address2', 'city', 'country', 'postal_code', 'license_no', 'valid_from', 'valid_to', 'extra', 'status'];
    protected $dates = ['deleted_at'];

    protected $casts = [
        'valid_from' => 'date',
        'valid_to' => 'date',
    ];

    public function schedules()
    {
        return $this->morphMany(Schedule::class, 'schedulable');
    }

    public function documents()
    {
        return $this->morphMany(Document::class, 'imageable');
    }

    public function doctorExpertises()
    {
        return $this->hasMany(DoctorExpertise::class, 'doctor_id', 'id');
    }

    public function consulationTypes()
    {
        return $this->hasMany(DoctorConsultationFee::class, 'doctor_id', 'id');
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id', 'id');
    }

    public function scopeSearch($query, $value)
    {
        return $query->where(function ($q) use ($value) {
            $q->where('name', 'like', "%$value%")
                ->orWhere('doctor_id', 'like', "%$value%")
                ->orWhere('email', 'like', "%$value%")
                ->orWhereHas('doctorExpertises.expertise', function ($q) use ($value) {
                    $q->where('name', 'like', "%$value%");
                })
                ->orWhere('phone', 'like', "%$value%")
                ->orWhereHas('clinic', function ($q) use ($value) {
                    $q->where('name', 'like', "%$value%");
                })
                ->orWhere('status', 'like', "%$value%");
        });
    }
}
