<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Grade extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function scopeBySearch(Builder $query, string $name)
    {
        return $query->where(DB::raw('LOWER(name)'), 'like', "%$name%");
    }
}
