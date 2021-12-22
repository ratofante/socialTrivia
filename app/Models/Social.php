<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    public $timestamp = true;
    protected $dateFormat = 'd-m-Y H:i:s';
    protected $fillable = ['user_id','pregunta', 'respuesta', 'opcion_1', 'opcion_2', 'opcion_3', 'puntuiacion'];
    protected $hidden = ['user_id'];
}
