<?php

namespace App\Http\Controllers;

use App\Models\EmpresaModulos;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePermissionsRequest;
use App\Http\Requests\Admin\UpdatePermissionsRequest;
use Validator;
use Auth;

class PermissionsController extends Controller
{
    /**
     * Crear una nueva instancia de controlador.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar una lista de permisos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('Usuario General')) {
            return redirect('/');
        }

        $permissions = Permission::all();

        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Muestra el formulario para crear nuevos permisos.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Almacenar un permiso recién creado en el almacenamiento.
     *
     * @param  \App\Http\Requests\StorePermissionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionsRequest $request)
    {
        Permission::create($request->all());

        return redirect()->route('admin.permissions.index')->with('msj','Permiso registrado exitosamente');
    }

    /**
     * Mostrar el formulario para editar Permiso.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idempresa = Auth::user()->id_empresa;
        $permission = Permission::findOrFail($id);
        $listmodulosempresa = EmpresaModulos::with('modulo')->where('id_empresa',$idempresa)->get();

        return view('admin.permissions.edit', compact('permission','listmodulosempresa'));
    }

    /**
     * Permiso de actualización en almacenamiento.
     *
     * @param  \App\Http\Requests\UpdatePermissionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('editar_permisos')) {
            return abort(401);
        }

        $permission = Permission::findOrFail($id);
        $this->validator_permission($request->all())->validate();
        $permission->id_modulo = $request->get('modulo');
        $permission->description = $request->get('description');
        $permission->update();

        return redirect()->route('admin.permissions.index')->with('msj','Permiso actualizado exitosamente');
    }

    /**
     * Obtenga las reglas de validación que se aplican a la solicitud.
     *
     * @return array
     */
    function validator_permission(array $data)
    {
        return Validator::make($data, [
            'modulo'      => 'required',
            'description'   => 'max:191',
        ]);
    }

    /**
     * Eliminar el permiso de almacenamiento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('eliminar_permisos')) {
            return abort(401);
        }

        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('admin.permissions.index')->with('msj','Permiso eliminado exitosamente');
    }

    /**
     * Eliminar todos los permisos seleccionados a la vez.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Permission::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
