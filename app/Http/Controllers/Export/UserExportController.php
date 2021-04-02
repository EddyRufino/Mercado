<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\User;

class UserExportController extends Controller
{
    public function pdf()
    {
        $users = User::get();
        $pdf = PDF::loadView('exports.exportPDF.users-pdf', compact('users'));

        return $pdf->stream();
    }

    // php artisan make:export UsersExport --model=User
    public function excel()
    {
        return Excel::download(new UsersExport, 'users-excel.xlsx');
    }
}
