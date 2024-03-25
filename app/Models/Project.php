<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'technologies_used',
        'status',
        'thumb',
        'documentation',
        'slug',
    ];
    protected $casts = [
        'slug' => 'string', //  n.b. conversione esplicita dello slug come stringa
    ];
}
