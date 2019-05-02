<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    protected $table = "empresa";
    protected $fillable = ['nome'];
    public $timestamps = false;

    public function socio()
    {
        return $this->hasMany('App\Models\Socio');
    }

}
