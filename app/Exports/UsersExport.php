<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{

    public function collection()
    {
        $users = User::join('assigned_roles', 'users.id', '=', 'assigned_roles.user_id')
                ->join('roles', 'roles.id', '=', 'assigned_roles.role_id')
                ->select('users.name', 'users.apellido', 'users.email', 'users.direccion', 'users.telefono', 'users.dni', 'roles.display_name')
                ->get();

        return $users;
    }
}
