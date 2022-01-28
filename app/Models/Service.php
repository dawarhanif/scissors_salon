<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

        public function category(): HasMany
        {
            return $this->hasMany(App/Models/Category::class);
        }
    
}
