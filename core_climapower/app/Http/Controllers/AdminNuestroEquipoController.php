<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NuestroEquipo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminNuestroEquipoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listnuestroequipo = NuestroEquipo::all();

        return view('admin.nuestroequipo.index', compact('listnuestroequipo'));
    }

    public function create()
    {
        return view('admin.nuestroequipo.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre_completo' => 'required',
            'cargo' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
            'descripcion_breve' => 'required',
            'descripcion' => 'required',
            'adjuntoequipo' => 'required|file|max:10240|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('adjuntoequipo')) {
            $file = $request->file('adjuntoequipo');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y').'_equipo_'.date('Y-m-d').'_'.$this->random_string().'.'.$extension;

            Storage::disk('adjuntoequipo')->put($filename, File::get($file));

            $equipo = new NuestroEquipo;
            $equipo->nombre_completo = $request->get('nombre_completo');
            $equipo->cargo = $request->get('cargo');
            $equipo->telefono = $request->get('telefono');
            $equipo->email = $request->get('email');
            $equipo->descripcion_breve = $request->get('descripcion_breve');
            $equipo->descripcion = $request->get('descripcion');
            $equipo->adjunto = $filename;
            $equipo->estado = 1;
            $equipo->save();

            return redirect()->route('admin.nuestroequipo.index')->with('msj','Equipo ingresado exitosamente');
        }
    }

    public function edit($id)
    {
        $equipo = NuestroEquipo::findOrFail($id);

        return view('admin.nuestroequipo.edit', compact('equipo'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre_completo' => 'required',
            'cargo' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
            'descripcion_breve' => 'required',
            'descripcion' => 'required',
            'adjuntoequipo' => 'nullable|file|max:10240|mimes:jpg,jpeg,png',
        ]);

        $equipo = NuestroEquipo::findOrFail($id);
        $equipo->nombre_completo = $request->get('nombre_completo');
        $equipo->cargo = $request->get('cargo');
        $equipo->telefono = $request->get('telefono');
        $equipo->email = $request->get('email');
        $equipo->descripcion_breve = $request->get('descripcion_breve');
        $equipo->descripcion = $request->get('descripcion');

        if ($request->hasFile('adjuntoequipo')) {
            $file = $request->file('adjuntoequipo');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y').'_equipo_'.date('Y-m-d').'_'.$this->random_string().'.'.$extension;

            Storage::disk('adjuntoequipo')->put($filename, File::get($file));

            $equipo->adjunto = $filename;
        }

        $equipo->estado = $request->get('estado');
        $equipo->update();

        return redirect()->route('admin.nuestroequipo.index')->with('msj','Equipo actualizado exitosamente');
    }

    public function destroy($id)
    {
        $equipo = NuestroEquipo::findOrFail($id);
        $equipo->delete();

        return redirect()->route('admin.nuestroequipo.index')->with('msj','Equipo eliminado exitosamente');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = NuestroEquipo::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    protected function random_string()
    {
        $key = '';
        $keys = array_merge(range('a', 'z'), range(0, 9));

        for ($i = 0; $i < 10; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

}
