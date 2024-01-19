<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class committee extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);  
    }
    public function minute()
    {
        return $this->hasOne(Minute::class);
    }
}
