<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registro extends Model
{
    protected $table ='registro';
    public $timestamps = false;

    public function MoreThanOnce (){
        return $this::all();
    }
}
