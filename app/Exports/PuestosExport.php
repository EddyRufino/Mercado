<?php

namespace App\Exports;

use App\Puesto;
use App\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class PuestosExport implements FromQuery
{
    use Exportable;

    private $name;

    public function forName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function query()
    {
        return User::query()->whereYear('created_at', $this->name);
    }
}
