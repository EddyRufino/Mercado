<?php

namespace App;

use App\Actividad;
use App\Deuda;
use App\Pago;
use App\Tipo;
use App\Ubicacion;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $guarded = [];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }

    // public function pagos()
    // {
    //     return $this->hasMany(Pago::class);
    // }

    // public function tipo_pago()
    // {
    //     return $this->hasMany(Tipo::class);
    // }

    // public function tipo_deuda()
    // {
    //     return $this->hasMany(Tipo::class);
    // }

    // public function deudas()
    // {
    //     return $this->hasMany(Deuda::class);
    // }
}
