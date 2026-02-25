<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesRespaldosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['publicidad','avatares','adjuntomultimedia','adjuntoexperiencia','adjuntoequipo','adjuntoacercanosotros']);
    }

    public function adjuntoexperiencia(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntoexperiencia')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntoexperiencia')->response($path);
    }

    public function adjuntoequipo(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntoequipo')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntoequipo')->response($path);
    }

    public function adjuntoacercanosotros(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntoacercanosotros')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntoacercanosotros')->response($path);
    }

    public function adjuntomultimedia(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntomultimedia')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntomultimedia')->response($path);
    }

    public function adjuntorespaldoclientes(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntorespaldoclientes')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntorespaldoclientes')->response($path);
    }

    public function adjuntomoviles(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntomoviles')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntomoviles')->response($path);
    }

    public function adjuntopago(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntopago')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntopago')->response($path);
    }

    public function adjuntoentrega(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntoentrega')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntoentrega')->response($path);
    }

    public function adjuntocedibles(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntocedibles')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntocedibles')->response($path);
    }

    public function adjuntoproformas(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntoproformas')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntoproformas')->response($path);
    }

    public function adjuntopagosfacturasctactes(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntopagosfacturasctactes')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntopagosfacturasctactes')->response($path);
    }

    public function adjuntocasosabiertos(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntocasosabiertos')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntocasosabiertos')->response($path);
    }

    public function adjuntoprogramaciones(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntoprogramaciones')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntoprogramaciones')->response($path);
    }

    public function adjuntorendiciones(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntorendiciones')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntorendiciones')->response($path);
    }

    public function adjuntonominas(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntonominas')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntonominas')->response($path);
    }

    public function adjuntoexcelproforma(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntoexcelproforma')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntoexcelproforma')->response($path);
    }

    public function adjuntogarantias(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntogarantias')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntogarantias')->response($path);
    }

    public function adjuntofacturaciones(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntofacturaciones')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntofacturaciones')->response($path);
    }

    public function adjuntoretiroscotizaciones(Request $request, $path)
    {
        abort_if(!Storage::disk('adjuntoretiroscotizaciones')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('adjuntoretiroscotizaciones')->response($path);
    }

    public function avatares(Request $request, $path)
    {
        abort_if(!Storage::disk('avatares')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('avatares')->response($path);
    }

    public function publicidad(Request $request, $path)
    {
        abort_if(!Storage::disk('publicidad')->exists($path),404,"El archivo no se encuentra en el disco.");

        return Storage::disk('publicidad')->response($path);
    }

}