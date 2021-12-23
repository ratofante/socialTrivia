<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    public $timestamp = true;
    protected $fillable = ['user_id','pregunta', 'respuesta', 'opcion_1', 'opcion_2', 'opcion_3', 'puntuiacion'];
}
