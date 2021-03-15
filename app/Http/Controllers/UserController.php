<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UsuariosRequest;
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
        $users = User::latest()->paginate(3);
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
        // return $request->all();
        // $user = new User;

        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;

        $user->roles()->attach($request->roles);

        // dd($user);

        $user->save();

        return back()->with('status', 'Usuario guardado con éxito!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        $this->authorize('show', $user);

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {

        $user = User::findOrFail($id);

        // $this->authorize('update', $user);

        $roles = Role::pluck('display_name', 'id');

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        // $rules = $this->validate($request,[
        //     'name' => 'required',
        //     'email' => 'required', Rule::unique('users')->ignore($id),
        //     'avatar' => '',
        //     // 'password' => 'required|confirmed',
        //     'password' => '',
        // ]);

        // $user = User::findOrFail($id);

        // $user->update([
        //     $user->name = $request->name,
        //     $user->email = $request->email,
        //     $user->password = $request->password
        // ]);

        // $user->roles()->sync($request->roles);

        $rules = [
            'name' => 'required',
            'email' => 'required', Rule::unique('users')->ignore($id),
            // 'password' => 'required|confirmed',
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ];

        $this->validate($request, $rules);

        $user = User::findOrFail($id);

        $user->update($request->only(['name', 'email']));

        if (! is_null($request->password)) {
            $user->password = $request->password;
            $user->update();
        }

        $user->roles()->sync($request->roles);

        return back()->with('status', 'Usuario actualizado con éxito!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('status', 'Usuario eliminado con éxito!');
    }
}
