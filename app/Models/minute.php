<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class minute extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->belongsTo(Student::class);
    }
    public function committee()
    {
        return $this->belongsTo(committee::class);
    }
}
