<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
     protected $fillable = ['content','answer_image_path',];
    
    public function getAnswerContent(){
        
        return $this->content;    
        }
        
    
    
    public function questions()
    {
        return $this->belongsTo(Question::class);
    }
    
    
}
