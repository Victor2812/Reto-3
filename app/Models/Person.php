<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Person extends Model
{
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | Relaciones
    |--------------------------------------------------------------------------
    |
    |
    */

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function studentSheets()
    {
        return $this->hasMany(DualSheet::class, 'student_id');
    }

    public function academicTutorSheets()
    {
        return $this->hasMany(DualSheet::class, 'tutor_id');
    }

    public function comments()
    {
        return $this->hasMany(DiaryComments::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Ayudantes
    |--------------------------------------------------------------------------
    |
    |
    */

    public function fullName() {
        return $this->name . ' ' . $this->surname;
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    |
    |
    */

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

    public function scopeAvailableCompanyTutors($query)
    {
        return $query->whereNotIn('id', DB::table('companies')->select('person_id'));
    }

    public function scopeStudents($query)
    {
        return $query->where('role_id', '=', config('roles.ALUMNO'));
    }

    public function scopeAllTutors($query)
    {
        return $query->where('role_id', '!=', config('roles.ALUMNO'));
    }

    public function scopeIsTutorOnDualSheets($query) {
        // Esta función deberá comprobar que un coordinador es tutor
        throw new Exception('Función no implementada');
    }

    public function scopeBySearchTerms($query, string $search_terms)
    {
        $search_terms = explode(' ', trim($search_terms));
        $search_terms = array_filter($search_terms, function ($param) {
            return strlen($param) > 0;
        });

        return $query->where(function (Builder $query) use ($search_terms) {
            foreach ($search_terms as $term) {
                $term = strtolower($term);
                $query->orWhere(DB::raw("LOWER(name)"), 'like', "%$term%")
                    ->orWhere(DB::raw("LOWER(surname)"), 'like', "%$term%")
                    ->orWhere(DB::raw("LOWER(dni)"), 'like', "%$term%");
            }
        });
    }
}
