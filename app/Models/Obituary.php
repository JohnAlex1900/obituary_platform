<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obituary extends Model
{
    use HasFactory;

    // Specify which fields can be mass-assigned
    protected $fillable = [
        'name',
        'date_of_birth',
        'date_of_death',
        'content',
        'author',
        'submission_date',
        'slug'
    ];

    // Disable automatic timestamps
    public $timestamps = false;

    // Cast date_of_death to Carbon instance
    protected $casts = [
        'date_of_death' => 'datetime',  // This ensures it's treated as a Carbon object
    ];
}
