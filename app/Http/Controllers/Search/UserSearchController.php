<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserSearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->get('search');

        $users = User::where('apellido', 'like', '%'. $search.'%')
                    ->orWhere('name', 'like', '%'. $search.'%')
                    ->latest()
                    ->paginate(7);

        $users->appends(['search' => $search]);

        return view('searchs.searchUser', compact('users'));
    }
}
