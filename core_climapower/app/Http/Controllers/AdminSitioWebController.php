<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAdminContactoOtrosRequest;
use App\Http\Requests\Admin\UpdateAdminSitioWebRequest;
use App\Models\AdminContactoOtros;
use App\Models\AdminSitioWeb;

class AdminSitioWebController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $adminsitiowebs = AdminSitioWeb::all();

        return view('admin.adminsitioweb.index', compact('adminsitiowebs'));
    }

    public function edit($id)
    {
        $adminsitioweb = AdminSitioWeb::findOrFail($id);

        return view('admin.adminsitioweb.edit', compact('adminsitioweb'));
    }

    public function update(UpdateAdminSitioWebRequest $request)
    {
        $idregistro = $request->idregistro;

        $adminsitioweb = AdminSitioWeb::findOrFail($idregistro);
        $adminsitioweb->titulo = $request->get('titulo');
        $adminsitioweb->datatxt = $request->get('datatxt');
        $adminsitioweb->update();

        return redirect('admin/adminsitioweb')->with('msj','Sección actualizada exitosamente');
    }

    //admin datos contacto/otros
    public function indexContactoOtros()
    {
        $admincontactootros = AdminContactoOtros::findOrFail(1);

        return view('admin.admincontactootros.edit', compact('admincontactootros'));
    }

    public function updateContactoOtros(UpdateAdminContactoOtrosRequest $request)
    {
        $admincontactootros = AdminContactoOtros::findOrFail(1);
        $admincontactootros->telefono = $request->get('telefono');
        $admincontactootros->email = $request->get('email');
        $admincontactootros->nuestra_ubicacion = $request->get('nuestra_ubicacion');
        $admincontactootros->rrss_facebook = $request->get('rrss_facebook');
        $admincontactootros->rrss_twitter = $request->get('rrss_twitter');
        $admincontactootros->rrss_instagram = $request->get('rrss_instagram');
        $admincontactootros->rrss_linkedin = $request->get('rrss_linkedin');
        $admincontactootros->anios_negocio = $request->get('anios_negocio');
        $admincontactootros->casos_exitos = $request->get('casos_exitos');
        $admincontactootros->clientes_satisfechos = $request->get('clientes_satisfechos');
        $admincontactootros->consultores_profesionales = $request->get('consultores_profesionales');
        $admincontactootros->update();

        return redirect('admin/admincontactootros')->with('msj','Sección actualizada exitosamente');
    }

}
