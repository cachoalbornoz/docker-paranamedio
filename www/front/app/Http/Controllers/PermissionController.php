<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function index()
    {
        return view('permissions.index');
    }

    public function getPermissions(Request $request)
    {
        $totalData     = $permission = Permission::select('id')->count();
        $totalFiltered = $totalData;
        $limit         = $request->input('length');
        $start         = $request->input('start');

        if (empty($request->input('search.value'))) {
            $permission = Permission::select('id', 'name')
                ->offset($start)
                ->limit($limit)
                ->orderBy('name', 'asc')
                ->get();

        } else {

            $search = $request->input('search.value');

            $permission = Permission::where('name', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy('name', 'asc')
                ->get();

            $totalFiltered = Permission::where('name', 'LIKE', "%{$search}%")->count();
        }

        $data = [];
        if (!empty($permission)) {
            foreach ($permission as $permission) {
                $Data['id']         = $permission->id;
                $Data['check']      = "<input type='checkbox' value=" . $permission['id'] . " name='borrar[]' />";
                $Data['name']       = '<a href= "' . route('permissions.edit', $permission->id) . '">' . $permission->name . '</a>';
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
        return view('permissions.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->input('name')]);

        return redirect()->route('permissions.index');
    }

    public function show($id)
    {
        $permission = Permission::find($id);
        return view('permissions.show', compact('permission'));
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {

        $permission       = Permission::find($id);
        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('permissions.index');
    }

    public function destroy(Request $request)
    {
        Permission::whereIn('id', $request->input('values'))->delete();
        return response()->json([]);
    }

}
