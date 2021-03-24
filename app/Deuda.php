<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Puesto;
use App\Tipo;

class Deuda extends Model
{
    protected $guarded = [];

    public function puesto()
    {
        return $this->belongsTo(Puesto::class);
    }

    // public function tipo()
    // {
    //     return $this->belongsTo(Tipo::class);
    // }
}
