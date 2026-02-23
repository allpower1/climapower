<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Usuarios registrados por mes (últimos 6 meses)
        $usuariosPorMes = DB::table('users')
            ->select(DB::raw('COUNT(id) as total'), DB::raw("DATE_FORMAT(created_at, '%Y-%m') as mes"))
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        // Planes vendidos por mes
        $planesPorMes = DB::table('users_planes')
            ->select(DB::raw('COUNT(id) as total'), DB::raw("DATE_FORMAT(created_at, '%Y-%m') as mes"))
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        // Top 5 planes contratados
        $topPlanes = DB::table('users_planes')
            ->join('admin_planes', 'users_planes.id_plan', '=', 'admin_planes.id')
            ->select(
                DB::raw("
                    CASE admin_planes.id_categoria
                        WHEN 1 THEN CONCAT('Masajista - ', admin_planes.nombre_plan)
                        WHEN 2 THEN CONCAT('Agencia - ', admin_planes.nombre_plan)
                        WHEN 3 THEN CONCAT('Publicidad - ', admin_planes.nombre_plan)
                        ELSE CONCAT('Otro - ', admin_planes.nombre_plan)
                    END as nombre_categoria_plan
                "),
                DB::raw('COUNT(users_planes.id) as total')
            )
            ->groupBy('admin_planes.id_categoria', 'admin_planes.nombre_plan')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        // Usuarios por región
        $usuariosPorRegion = null;

        // Códigos usados vs no usados
        $codigos = [
            'usados' => DB::table('codigos_registros')->whereNotNull('id_user_canjeado')->count(),
            'no_usados' => DB::table('codigos_registros')->whereNull('id_user_canjeado')->count(),
        ];

        // Ingresos por mes (pagos reales)
        $ingresosPorMes = DB::table('pagos_flow')
            ->select(DB::raw("SUM(monto) as total"), DB::raw("DATE_FORMAT(created_at, '%Y-%m') as mes"))
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        // Suscripciones activas vs inactivas
        $hoy = Carbon::now();
        $subsActivas = DB::table('users_planes')->where('activo_hasta', '>=', $hoy)->count();
        $subsInactivas = DB::table('users_planes')->where('activo_hasta', '<', $hoy)->count();

        // Crecimiento acumulado de usuarios
        $crecimientoUsuarios = DB::table('users')
            ->select(DB::raw("COUNT(id) as total"), DB::raw("DATE_FORMAT(created_at, '%Y-%m') as mes"))
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        // Top 10 comunas con más usuarios
        $topComunas = null;

        // Indicadores rápidos
        $totalUsuarios = DB::table('users')->count();

        $totalIngresosHistorico = DB::table('pagos_flow')->sum('monto');

        $totalIngresosMes = DB::table('pagos_flow')
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->sum('monto');

        $planesActivos = DB::table('users_planes')
            ->where('activo_hasta', '>=', Carbon::now())
            ->count();

        $planesInactivos = DB::table('users_planes')
            ->where('activo_hasta', '<', Carbon::now())
            ->count();

        $totalMasajistas = 0;
        $totalAgencias = 0;
        $totalPublicidad = 0;

        return view('admin.dashboard', compact(
            'usuariosPorMes',
            'planesPorMes',
            'topPlanes',
            'usuariosPorRegion',
            'codigos',
            'ingresosPorMes',
            'subsActivas',
            'subsInactivas',
            'crecimientoUsuarios',
            'topComunas',
            'totalUsuarios',
            'totalIngresosHistorico',
            'totalIngresosMes',
            'planesActivos',
            'planesInactivos',
            'totalMasajistas',
            'totalAgencias',
            'totalPublicidad'
        ));
    }
}
