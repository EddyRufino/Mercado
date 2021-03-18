<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PerfilRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(Request $request)
    {
        return view('profiles.edit', [
            'user' => $request->user()
        ]);
    }

    public function update(PerfilRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $user = $request->user();

            $user->update($request->except(['password']));

            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
                // $user->sendEmailVerificationNotification();
                $user->update();
            }

            if (! is_null($request->password)) {
                $user->password = $request->password;
                $user->update();
            }

            return back()->with('status', 'Su Perfil Fue Editado!');
        }, 5);

    }
}
