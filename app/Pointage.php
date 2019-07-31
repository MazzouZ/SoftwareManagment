<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pointage extends Model
{
    public $table = "table_pointage";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'jour', 'time_in','time_out','total'
    ];
     public function user(){
            return $this->belongsTo('App\User');
        }
}
