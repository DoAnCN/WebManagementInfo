<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    //
    protected $table = "host";

    public function instance(){
        return $this->belongsTo('App\Instance','Host_id','id');
    }
}
