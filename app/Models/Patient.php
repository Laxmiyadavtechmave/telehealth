<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes, Notifiable;

    protected $fillable = [ 'clinic_id','patient_id', 'ssn','name', 'dob' ,'email', 'password', 'img', 'gender','marital_status' ,'national_id','phone', 'address1', 'address2', 'city', 'country', 'postal_code', 'extra', 'status'];

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
