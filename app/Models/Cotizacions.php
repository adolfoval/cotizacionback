<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacions extends Model
{
    use HasFactory;
    protected $sillable = ["modelo", "nombre", "email", "celular", "departamento", "ciudad"];
    protected $table = 'cotizacion';
}
