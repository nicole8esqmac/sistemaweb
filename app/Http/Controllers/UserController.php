<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $users = User::with('roles')->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $roles = Role::pluck('title', 'id');

        return view('users.create', compact('roles'));
    }

//     public function store(StoreUserRequest $request)
// {
//     try {
//         // Valida y crea el usuario
//         $user = User::create($request->validated());

//         // Sincroniza los roles si se proporcionan en la solicitud
//         if ($request->has('roles')) {
//             $user->roles()->sync($request->input('roles'));
//         }

//         return redirect()->route('users.index')->with('success', 'El usuario se ha creado con éxito.');
//     } catch (\Exception $e) {
//         return redirect()->route('users.index')->with('error', 'Ha ocurrido un error al crear el usuario.');
//     }
// }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index')->with('success', 'El usuario se ha creado con éxito.');

    }



    public function show(User $user)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $roles = Role::pluck('title', 'id');

        $user->load('roles');

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, 'ACCESO DENEGADO');

        $user->delete();

        return redirect()->route('users.index');
    }
}
