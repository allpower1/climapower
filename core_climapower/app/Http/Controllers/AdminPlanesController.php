<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdatePlanesRequest;
use App\Models\AdminPlanes;

class AdminPlanesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->hasRole('Usuario General')) {
            return redirect('/');
        }

        $listplanes = AdminPlanes::all();

        return view('admin.planes.index', compact('listplanes'));
    }

    public function edit($id)
    {
        $plan = AdminPlanes::findOrFail($id);

        return view('admin.planes.edit', compact('plan'));
    }

    public function update(UpdatePlanesRequest $request, $id)
    {
        if (! Gate::allows('editar_roles')) {
            return abort(401);
        }

        $plan = AdminPlanes::findOrFail($id);
        $plan->nombre_plan = $request->get('nombre_plan');
        $plan->valor = $request->get('valor');
        $plan->precio_oferta = $request->get('precio_oferta');
        $plan->fecha_caducidad_oferta = $request->get('fecha_caducidad_oferta');
        $plan->texto_publico = $request->get('datatxt',null);
        $plan->estado = $request->get('estado');
        $plan->update();

        return redirect()->route('admin.planes.index')->with('msj','Plan actualizado exitosamente');
    }

}
