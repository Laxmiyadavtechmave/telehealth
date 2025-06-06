<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['imageable_type', 'imageable_id', 'img','title'];

    public function imageable()
    {
        return $this->morphTo();
    }
}
