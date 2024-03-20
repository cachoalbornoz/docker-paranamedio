<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        return view('users.index');
    }

    public function getUsers(Request $request)
    {
        $totalData     = $users = User::select('id')->count();
        $totalFiltered = $totalData;
        $limit         = $request->input('length');
        $start         = $request->input('start');

        if (empty($request->input('search.value'))) {
            $users = User::select('id', 'username', 'apellido', 'nombre', 'email')
                ->offset($start)
                ->limit($limit)
                ->orderBy('apellido', 'asc')
                ->orderBy('nombre', 'asc')
                ->get();

        } else {

            $search = $request->input('search.value');

            $users = User::where('username', 'LIKE', "%{$search}%")
                ->orWhere('apellido', 'LIKE', "%{$search}%")
                ->orWhere('nombre', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy('apellido', 'asc')
                ->orderBy('nombre', 'asc')
                ->get();

            $totalFiltered = User::where('username', 'LIKE', "%{$search}%")
                ->orWhere('apellido', 'LIKE', "%{$search}%")
                ->orWhere('nombre', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];
        if (!empty($users)) {
            foreach ($users as $user) {
                $Data['id']       = $user->id;
                $Data['check']    = "<input type='checkbox' value=" . $user['id'] . " name='borrar[]' />";
                $Data['username'] = '<a href= "' . route('users.edit', $user->id) . '">' . $user->username . '</a>';
                $Data['nombre']   = $user->nombre;
                $Data['apellido'] = $user->apellido;
                $Data['email']    = $user->email;
                $Data['rol']      = $user->rol();
                $data[]           = $Data;
            }
        }

        $json_data = [
            'draw'            => intval($request->input('draw')),
            'recordsTotal'    => intval($totalData),
            'recordsFiltered' => intval($totalFiltered),
            'data'            => $data,
        ];

        print json_encode($json_data);

    }

    public function create(): View
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nombre'   => 'required',
            'apellido' => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles'    => 'required',
        ]);

        $input             = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function show($id): View
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id): View
    {
        $user     = User::find($id);
        $roles    = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'nombre'   => 'required',
            'apellido' => 'required',
            'email'    => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles'    => 'required',
        ]);

        $input = $request->all();
        if(!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, ['password']);
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index');
    }

    public function destroy(Request $request)
    {
        User::whereIn('id', $request->input('values'))->delete();
        return response()->json([]);
    }
}
