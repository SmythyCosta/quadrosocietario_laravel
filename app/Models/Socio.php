<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    //
    protected $table = "socio";
    protected $fillable = ['nome'];
    public $timestamps = false;

    function empresa() {
        return $this->belongsTo('App\Models\Company');
    }
}
