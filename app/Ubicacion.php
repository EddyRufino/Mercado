<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $guarded = [];

    public function puestos()
    {
        return $this->hasMany(Puesto::class);
    }
}
