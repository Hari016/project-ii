<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class teacherProfile extends Model
{
      protected $fillable = ['teacher_id', 'organization_name', 'bio', 'post'];
    
    public function teacher()
    {
        return $this->belongsTo(teacher::class);
    }
}
