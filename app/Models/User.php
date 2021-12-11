<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Symfony\Component\String\ByteString;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass asignable
     * 
     * @var array
     */

     protected $fillable =[
         'name',
         'email',
         'password'
     ];

     /**
     * The attributes that should be hidden for arrays
     * 
     * @var array
     */
    protected $hidden =[
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be cast to native types
     * 
     * @var array
     */

    protected $cast =[
        'email_verified_at'=>'datetime'
    ];

    public function setPasswordAtributte ($password){
        $this->attributes['password']= bcrypt($password);
    }

}
