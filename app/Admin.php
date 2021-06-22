<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    //
   
    
    protected $guard = 'admin';
    
    protected $fillable = [
        'name','email','password'];
    
    protected $hidden = [
        'password','remember_token',];    
        
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    
     public function limitedblogs()
    {
        return $this->hasMany(Limitedblog::class);
    }
}
