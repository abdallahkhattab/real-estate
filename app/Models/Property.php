<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function photos()
    {
        return $this->hasMany(PropertyPhoto::class, 'property_id');
    }

}
