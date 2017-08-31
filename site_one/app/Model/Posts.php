<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    //自动设置slug属性  
    function setTitleAttribute($title) {  
        $this->attributes['title'] = $title;  
        if (!$this->exists) {  
            $this->attributes['slug'] = mt_rand(); //str_slug($title);  
        }  
    }
}
