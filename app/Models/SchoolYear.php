<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SchoolYear extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function dualSheets()
    {
        return $this->hasMany(DualSheet::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Ayudantes
    |--------------------------------------------------------------------------
    |
    |
    */

    public function startYear()
    {
        // YYYY-MM-DD
        return (int)substr($this->start, 0, 4);
    }

    public function endYear()
    {
        // YYYY-MM-DD
        return (int)substr($this->end, 0, 4);
    }

    public function toText()
    {
        $s = $this->startYear();
        $e = $this->endYear();
        return "$s-$e";
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    |
    |
    */

    public function scopeNewestYear(Builder $query)
    {
        return $query->orderBy('end', 'desc')->limit(1);
    }

    public function scopeOldestYear(Builder $query)
    {
        return $query->orderBy('end', 'asc')->limit(1);
    }

    public function scopeStartYearIsGreaterThan(Builder $query, int $year)
    {
        return $query->where(DB::raw('DATE_FORMAT(start, "%Y")'), '>=', $year);
    }

    public function scopeEndYearIsLessThan(Builder $query, int $year)
    {
        return $query->where(DB::raw('DATE_FORMAT(end, "%Y")'), '<=', $year);
    }
}
