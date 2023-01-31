<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function scopeCoordinators($query)
    {
        return $query->where('role_id', '=', config('roles.COORDINADOR'));
    }

    public function scopeStudentTutors($query)
    {
        return $query->where('role_id', '=', config('roles.FACTILITADOR_ACADEMICO'));
    }

    public function scopeCompanyTutors($query)
    {
        return $query->where('role_id', '=', config('roles.FACILITADOR_EMPRESA'));
    }

    public function scopeStudents($query)
    {
        return $query->where('role_id', '=', config('roles.ALUMNO'));
    }
}
