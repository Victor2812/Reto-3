<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'CIF', 'location'
    ];

    public function dualSheets()
    {
        return $this->hasMany(DualSheet::class);
    }
}
