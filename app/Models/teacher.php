<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
        protected $fillable = ['name', 'address', 'contact'];

         public function profile()
    {
        return $this->hasOne(teacherProfile::class);
    }
}
