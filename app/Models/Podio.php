<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podio extends Model
{
    use HasFactory;

    protected $table = 'podio';
    protected $primaryKey = 'id';

    public $timestamps = true;
    //protected $dateFormat = 'd-m-Y H:i:s';
    protected $fillable = ['username', 'resultado'];
    protected $hidden = ['id', 'user_id'];

    public function userModel()
    {
        return $this->hasMany(Users::class);
    }
}
