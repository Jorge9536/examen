<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';

    protected $fillable = [
        'nombres',
        'apellidos',
        'carnet_identidad',
        'edad',
        'fecha_nacimiento',
        'estado',
        'email'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'estado' => 'boolean'
    ];
}