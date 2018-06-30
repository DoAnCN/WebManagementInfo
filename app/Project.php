<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = "project";

    public function instance(){
        return $this->belongsTo('App\Instance','id_project','id');
    }
}

