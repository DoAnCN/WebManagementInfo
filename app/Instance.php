<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    //
    protected $table = "instance";
    public $timestamps=false;
    public function project(){
        return $this->hasMany('App\Project','Project_id','id');
    }

    public function host(){
        return $this->hasMany('App\Host','Host_id','id');
    }
}
