<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = "Project";

    public function instance(){
        return $this->belongsTo('App\Instance','Project_id','id');
    }
}

