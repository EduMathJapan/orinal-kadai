<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
 {
    //
    protected $fillable = ['subject','content','image_path',];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
}
