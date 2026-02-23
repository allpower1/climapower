<?php

namespace App\Http\Controllers;

use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateRolesRequest;
use App\Models\RoleHasPermissions;

class RolesController extends Controller
{
    /**
     * Crear una nueva instancia de controlador.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar una lista de funciones.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('Usuario General')) {
            return redirect('/');
        }

        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Muestra el formulario para crear un nuevo rol.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Almacenar un rol recién creado en el almacenamiento.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('agregar_roles')) {
            return abort(401);
        }

        $role = new Role;
        $role->name = $request->get('name');
        $role->guard_name = 'web';
        $role->description = $request->get('description');
        $role->save();

        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->givePermissionTo($permissions);

        return redirect()->route('admin.roles.index')->with('msj','Rol registrado exitosamente');
    }

    /**
     * Mostrar el formulario para editar Rol.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listadopermisosyasignados = RoleHasPermissions::where('role_id',$id)->get()->pluck('permission_id')->toArray();
        $listpermissionssinasignar = Permission::whereNotIn('id',$listadopermisosyasignados)->get();
        $listpermissionsasignados = RoleHasPermissions::with('permiso')->where('role_id',$id)->get();
        $role = Role::findOrFail($id);

        return view('admin.roles.edit', compact('role','listpermissionssinasignar','listpermissionsasignados'));
    }

    /**
     * Actualizar rol en almacenamiento.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolesRequest $request, $id)
    {
        if (! Gate::allows('editar_roles')) {
            return abort(401);
        }

        $role = Role::findOrFail($id);
        $role->name = $request->get('name');
        $role->description = $request->get('description');
        $role->update();

        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);

        return redirect()->route('admin.roles.index')->with('msj','Rol actualizado exitosamente');
    }

    /**
     * Eliminar rol del almacenamiento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('eliminar_roles')) {
            return abort(401);
        }

        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('admin.roles.index')->with('msj','Rol eliminado exitosamente');
    }

    /**
     * Eliminar todos los roles seleccionados a la vez.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Role::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
