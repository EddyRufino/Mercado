<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoAnticipado extends Model
{
    protected $guarded = [];

    public function puesto()
    {
        return $this->belongsTo(Puesto::class);
    }
}
