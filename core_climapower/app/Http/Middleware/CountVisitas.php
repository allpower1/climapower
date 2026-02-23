<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitas;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CountVisitas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->isMethod('GET') && !$request->is('admin/*') && !$request->is('login') && !$request->is('loginadmin') && !$request->is('home')) {
            $ip = $request->ip();
            $url = $request->path();
            $userAgent = request()->header('User-Agent');
            $today = Carbon::today()->toDateString();

            // Filtro simple de bots (puedes hacer esto más avanzado)
            if (preg_match('/bot|crawl|slurp|spider/i', $userAgent) && !preg_match('/googlebot/i', $userAgent)) {
                abort(403, 'Bot not allowed');
            }

            // Tiempo límite (30 minutos atrás)
            /*
            Tiempo deseado	Código
            1 minuto        subMinute()
            30 minutos	    subMinutes(30)
            1 hora	        subHour()
            3 horas	        subHours(3)
            1 día	        subDay()
            */
            $tiempoDesfase = Carbon::now()->subMinute();

            $exists = Visitas::where('ip_address', $ip)->where('url', $url)->where('created_at', '>=', $tiempoDesfase)->exists();

            if (!$exists) {
                Visitas::create([
                    'url' => $url,
                    'ip_address' => $ip,
                    'visit_date' => $today,
                ]);
            }
        }

        return $next($request);
    }
}
