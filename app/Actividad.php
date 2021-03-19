<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $guarded = [];

    public function puestos()
    {
        return $this->hasMany(Puesto::class);
    }
}
