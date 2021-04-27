<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Puesto;
use App\Tipo;

class Pago extends Model
{
    protected $guarded = [];

    public function puesto()
    {
        return $this->belongsTo(Puesto::class);
    }
    // public function puestos()
    // {
    //     return $this->hasMany(Puesto::class);
    // }

    // public function tipo()
    // {
    //     return $this->belongsTo(Tipo::class);
    // }
}
