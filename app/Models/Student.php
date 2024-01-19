<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'course_id',
        'user_id',
        'name',
        'password',
        'theme',
        'student_code',
        'email',
        'contact'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function committee()
    {
        return $this->hasOne(Committee::class);
    }

    public function minute()
    {
        return $this->hasOne(Minute::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAuthIdentifierName()
    {
        return 'id'; // Ou o nome do campo usado como identificador
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
