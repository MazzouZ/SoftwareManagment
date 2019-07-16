<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docs_administratif extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
