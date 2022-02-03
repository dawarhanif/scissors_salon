<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service_Category extends Model
{
    use HasFactory;


   
    
    public function service(): BelongsTo
    {
        return $this->hasMany(Service::class);
    }
    
}
