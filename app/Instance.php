<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    //
    protected $table = "instance";
    public $timestamps=false;
    public function project(){
        return $this->hasMany('App\Project','id_project','id');
    }

    public function host(){
        return $this->hasMany('App\Host','id_host','id');
    }
}
