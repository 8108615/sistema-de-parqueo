<?php

namespace App\Http\Controllers;

use App\Models\Ajuste;
use App\Models\Cliente;
use App\Models\Espacio;
use App\Models\Tarifa;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Vehiculo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $ajuste = Ajuste::first();
        $total_roles = Role::count();
        $total_usuarios = User::whereDoesntHave('roles', function($query){
            $query->where('name', 'Super-Admin');
        })->withTrashed()->count();

        $total_espacios = Espacio::count();
        $total_espacios_libres = Espacio::where('estado', 'libre')->count();
        $total_espacios_ocupados = Espacio::where('estado', 'ocupado')->count();
        $total_espacios_mantenimiento = Espacio::where('estado', 'mantenimiento')->count();
        $total_tarifas = Tarifa::count();
        $total_clientes = Cliente::count();
        $total_vehiculos = Vehiculo::count();
        $total_tickets_activos = Ticket::where('estado_ticket', 'activo')->count();


        //calculo de ingresos
        $ingreso_hoy = Ticket::where('estado_ticket', 'completado')
        ->whereDate('fecha_salida',Carbon::today())
        ->sum('monto_total');

        $ingreso_ayer = Ticket::where('estado_ticket', 'completado')
        ->whereDate('fecha_salida',Carbon::yesterday())
        ->sum('monto_total');

        $ingreso_esta_semana = Ticket::where('estado_ticket', 'completado')
        ->whereBetween('fecha_salida',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->sum('monto_total');

        $ingreso_semana_anterior = Ticket::where('estado_ticket', 'completado')
        ->whereBetween('fecha_salida',[Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])
        ->sum('monto_total');

        $ingreso_este_mes = Ticket::where('estado_ticket', 'completado')
        ->whereMonth('fecha_salida', Carbon::now()->month)
        ->whereYear('fecha_salida', Carbon::now()->year)
        ->sum('monto_total');

        $ingreso_mes_anterior = Ticket::where('estado_ticket', 'completado')
        ->whereMonth('fecha_salida', Carbon::now()->subMonth()->month)
        ->whereYear('fecha_salida', Carbon::now()->subMonth()->year)
        ->sum('monto_total');

        $ingreso_total = Ticket::where('estado_ticket', 'completado')
        ->sum('monto_total');

        //calculo para los datos del grafico
        $ingresos_mensuales = Ticket::select(
            DB::raw('MONTH(fecha_salida) as mes'),
            DB::raw('SUM(monto_total) as total')
        )->where('estado_ticket', 'completado')
        ->groupBy('mes')
        ->orderBy('mes')
        ->get()
        ->keyBy('mes')
        ->toArray();

        $ingresos_data = array_fill(1, 12, 0);
        foreach($ingresos_mensuales as $mes => $data){
            $ingresos_data[$mes] = $data['total'];
        }

        return view('admin.index', compact('ajuste','total_roles', 'total_usuarios', 'total_espacios', 'total_espacios_libres', 'total_espacios_ocupados',
        'total_espacios_mantenimiento', 'total_tarifas', 'total_clientes', 'total_vehiculos', 'total_tickets_activos','ingreso_hoy','ingreso_ayer','ingreso_esta_semana',
        'ingreso_semana_anterior','ingreso_este_mes','ingreso_mes_anterior','ingreso_total','ingresos_mensuales','ingresos_data'));
    }
}
