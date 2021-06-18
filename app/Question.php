<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
 {
    //
    protected $fillable = ['subject','content','image',];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
