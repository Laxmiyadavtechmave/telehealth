<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nurse extends Model {
    use SoftDeletes;

    protected $guard_name = 'nurse';
    // important

    protected $fillable = [ 'clinic_id', 'nurse_id','doctor_id','role_id','name', 'dob' ,'email', 'password', 'img', 'gender','marital_status' ,'license_no','year_of_experience', 'language','valid_from', 'national_id','qualification','valid_to', 'phone', 'address1', 'address2', 'city', 'country', 'postal_code', 'extra', 'status' ];

    protected $dates = [ 'deleted_at' ];

    protected $casts = [
        'valid_from' => 'date',
        'valid_to' => 'date',
        'dob' => 'date',
    ];


    public function clinic(){
        return $this->belongsTo(Clinic::class,'clinic_id','id');
    }



    public function expertises(){
        return $this->hasMany(NurseExpertise::class,'nurse_id','id');
    }

     public function documents()
    {
        return $this->morphMany(Document::class, 'imageable');
    }

    public function getWholeAddressAttribute()
    {
        $parts = array_filter([
            $this->address1,
            $this->address2,
            $this->city,
            $this->postal_code,
            $this->country
        ]);

        return implode(', ', $parts);
    }



}
