<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'has_dual'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
