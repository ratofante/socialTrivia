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
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $fillable = ['pregunta', 'opcion_1', 'opcion_2', 'opcion_3', 'categoria'];
    protected $hidden = ['id'];
}
