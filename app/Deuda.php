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

    // public function scopeAllowed($query) {

    //   if (auth()->user()->can('view', $this))
    //   {
    //     return $query;
    //   }

    //   return $query->where('user_id', auth()->id());

    // }

    // public function tipo()
    // {
    //     return $this->belongsTo(Tipo::class);
    // }
}
