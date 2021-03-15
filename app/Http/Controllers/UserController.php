<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UsuariosRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin,recep');
    }

    public function index()
    {
        $users = User::latest()->paginate();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create', [
            'roles' => Role::pluck('display_name', 'id'),
            'user' => new User
        ]);
    }

    public function store(UsuariosRequest $request)
    {
        $user = User::create($request->all());

        $user->roles()->attach($request->roles);

        $user->save();

        return back()->with('status', 'Usuario guardado con éxito!');
    }

    public function show(User $user)
    {
        // $this->authorize('show', $user);

        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        // $this->authorize('update', $user);

        $roles = Role::pluck('display_name', 'id');

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(ProfileRequest $request, User $user)
    {
        $user->update($request->only(['name', 'email']));

        if (! is_null($request->password)) {
            $user->password = $request->password;
            $user->update();
        }

        $user->roles()->sync($request->roles);

        return back()->with('status', 'Usuario actualizado con éxito!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('status', 'Usuario eliminado con éxito!');
    }
}
