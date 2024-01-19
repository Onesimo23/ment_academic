<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'area_de_formacao', 'especializacao', 'preferencias'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function matches()
    {
        return $this->hasMany(Matches::class, 'student_id');
    }

    public function conversations()
    {
        return $this->hasMany(Conversations::class, 'student_id');
    }
}
