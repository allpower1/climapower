<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonios;

class AdminTestimoniosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listtestimonios = Testimonios::all();

        return view('admin.testimonios.index', compact('listtestimonios'));
    }

    public function edit($id)
    {
        $testimonio = Testimonios::findOrFail($id);

        return view('admin.testimonios.edit', compact('testimonio'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'estado' => 'required',
        ]);

        $testimonio = Testimonios::findOrFail($id);
        $testimonio->estado = $request->get('estado');
        $testimonio->update();

        return redirect()->back()->with('msj','Testimonio actualizado exitosamente');
    }

    public function destroy($id)
    {
        $testimonio = Testimonios::findOrFail($id);
        $testimonio->delete();

        return redirect()->back()->with('msj','Testimonio eliminado exitosamente');
    }

}
