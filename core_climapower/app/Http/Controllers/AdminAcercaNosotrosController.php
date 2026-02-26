<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminAcercaNosotros;
use Intervention\Image\ImageManager;

class AdminAcercaNosotrosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listacercanosotros = AdminAcercaNosotros::all();

        return view('admin.acercanosotros.index', compact('listacercanosotros'));
    }

    public function create()
    {
        return abort(404);
    }

    public function store(Request $request)
    {
        return abort(404);
    }

    public function edit($id)
    {
        $dataan = AdminAcercaNosotros::findOrFail(1);

        return view('admin.acercanosotros.edit', compact('dataan'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'texto_primera_parte' => 'required',
            'texto_segunda_parte' => 'required',
            'texto_tercera_parte' => 'required',
            'adjuntoprimeraimagen' => 'nullable|file|max:10240|mimes:jpg,jpeg,png',
            'adjuntosegundaimagen' => 'nullable|file|max:10240|mimes:jpg,jpeg,png',
            'adjuntoterceraimagen' => 'nullable|file|max:10240|mimes:jpg,jpeg,png',
        ]);

        $acercanosotro = AdminAcercaNosotros::findOrFail($id);
        $acercanosotro->texto_primera_parte = $request->get('texto_primera_parte');
        $acercanosotro->texto_segunda_parte = $request->get('texto_segunda_parte');
        $acercanosotro->texto_tercera_parte = $request->get('texto_tercera_parte');

        $rutaimagenes = storage_path().'/respaldos/adjuntoacercanosotros/';

        //primera imagen
        if ($request->hasFile('adjuntoprimeraimagen')) {
            $file = $request->file('adjuntoprimeraimagen');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y').'_acerca_nosotros_'.date('Y-m-d').'_'.$this->random_string().'.'.$extension;

            $manager = new ImageManager(['driver' => 'gd']);
            $image = $manager->make($file);
            $image->fit(371, 255);
            $image->save($rutaimagenes.$filename);

            $acercanosotro->imagen_uno = $filename;
        }

        //segunda imagen
        if ($request->hasFile('adjuntosegundaimagen')) {
            $file = $request->file('adjuntosegundaimagen');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y').'_acerca_nosotros_'.date('Y-m-d').'_'.$this->random_string().'.'.$extension;

            $manager = new ImageManager(['driver' => 'gd']);
            $image = $manager->make($file);
            $image->fit(371, 255);
            $image->save($rutaimagenes.$filename);

            $acercanosotro->imagen_dos = $filename;
        }

        //tercera imagen
        if ($request->hasFile('adjuntoterceraimagen')) {
            $file = $request->file('adjuntoterceraimagen');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y').'_acerca_nosotros_'.date('Y-m-d').'_'.$this->random_string().'.'.$extension;

            $manager = new ImageManager(['driver' => 'gd']);
            $image = $manager->make($file);
            $image->fit(371, 255);
            $image->save($rutaimagenes.$filename);

            $acercanosotro->imagen_tres = $filename;
        }

        $acercanosotro->update();

        return redirect()->route('admin.acercanosotros.index')->with('msj','Acerca de nosotros actualizado exitosamente');
    }

    public function destroy($id)
    {
        return abort(404);
    }

    public function massDestroy(Request $request)
    {
        return abort(404);
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
