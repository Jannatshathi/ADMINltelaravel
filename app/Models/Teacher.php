<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $guard = 'teacher';

    protected $fillable = [
        'name', 'email', 'password', 'description'
    ];

    protected $hidden = [
      'password', 'remember_token',
    ];

    public static function getTeacher(){
        $records = DB::table('teachers')->select('id', 'name', 'email', 'password', 'description');
        return $records;
    }
}
