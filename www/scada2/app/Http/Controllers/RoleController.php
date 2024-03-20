<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        return view('roles.index');
    }

    public function getRoles(Request $request)
    {
        $totalData     = $roles = Role::select('id')->count();
        $totalFiltered = $totalData;
        $limit         = $request->input('length');
        $start         = $request->input('start');

        if (empty($request->input('search.value'))) {
            $roles = Role::select('id', 'name', 'guard_name')
                ->offset($start)
                ->limit($limit)
                ->orderBy('name', 'asc')
                ->get();

        } else {

            $search = $request->input('search.value');

            $roles = Role::where('name', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy('name', 'asc')
                ->get();

            $totalFiltered = Role::where('name', 'LIKE', "%{$search}%")->count();
        }

        $data = [];
        if (!empty($roles)) {
            foreach ($roles as $rol) {
                $Data['id']         = $rol->id;
                $Data['check']      = "<input type='checkbox' value=" . $rol['id'] . " name='borrar[]' />";
                $Data['name']       = '<a href= "' . route('roles.edit', $rol->id) . '">' . $rol->name . '</a>';
                $Data['guard_name'] = $rol->guard_name;
                $data[]             = $Data;
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

    public function create()
    {

        $permissions = Permission::get();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name'        => 'required|unique:roles,name',
            'permissions' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);

        $role->permissions()->sync($request->input('permissions'));

        return redirect()->route('roles.index');
    }

    public function show($id)
    {

        $role = Role::find($id);
        return view('roles.show', compact('role'));
    }

    public function edit($id)
    {
        $role       = Role::find($id);
        $permission = Permission::all();

        return view('roles.edit', compact('role', 'permission'));
    }

    public function update(Request $request, $id)
    {
        $role       = Role::find($id);
        $role->name = $request->name;
        $role->save();

        $role->permissions()->sync($request->input('permissions'));

        return redirect()->route('roles.index');
    }

    public function destroy(Request $request)
    {
        Role::whereIn('id', $request->input('values'))->delete();
        return response()->json([]);
    }

}
