<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trivia extends Model
{
    use HasFactory;

    protected $table = 'trivia';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['pregunta', 'respuesta', 'opcion_1', 'opcion_2', 'opcion_3', 'categoria'];
    protected $hidden = ['id'];



    /***********************
     *
     * Esta función recibe un select
     * pregunta, respuesta, opcion_1, opcion_2, opcion_3
     * convertido a array toArray() $preguntas
     *
     * Devuelve un array con cada pregunta y sus posibles
     * respuestas de manera aleatoria para que la respuesta
     * salga en un lugar cualquiera.
     *
     */

}
