<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Clinic extends Authenticatable
{
    use SoftDeletes, HasRoles, Notifiable;

    protected $guard_name = 'clinic'; // important

    protected $fillable = ['clinic_id', 'name', 'img', 'email', 'password', 'license_no', 'valid_from', 'valid_to', 'phone', 'web_url', 'address1', 'address2', 'city', 'country', 'postal_code', 'map_link', 'extra', 'status'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'valid_from' => 'date',
        'valid_to' => 'date',
    ];

    protected $hidden = ['password', 'remember_token'];
    public function scopeSearch($query, $value)
    {
        return $query->where(function ($q) use ($value) {
            $q->where('name', 'like', "%$value%")
                ->orWhere('email', 'like', "%$value%")
                ->orWhere('license_no', 'like', "%$value%")
                ->orWhere('phone', 'like', "%$value%")
                ->orWhere('address1', 'like', "%$value%")
                ->orWhere('address2', 'like', "%$value%")
                ->orWhere('country', 'like', "%$value%")
                ->orWhere('city', 'like', "%$value%")
                ->orWhere('postal_code', 'like', "%$value%")
                ->orWhere('status', 'like', "%$value%");
        });
    }

    public function schedules()
    {
        return $this->morphMany(Schedule::class, 'schedulable');
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
