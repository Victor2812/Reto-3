<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'CIF', 'location'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function dualSheets()
    {
        return $this->hasMany(DualSheet::class);
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
                    ->orWhere(DB::raw("LOWER(CIF)"), 'like', "%$term%")
                    ->orWhere(DB::raw("LOWER(location)"), 'like', "%$term%");
            }
        });
    }
}
