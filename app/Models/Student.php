<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'email', 'password', 'address'];

    protected $guard = 'student';

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function images(){
        return $this->hasMany(StudentImage::class, 'student_id');
    }
}
