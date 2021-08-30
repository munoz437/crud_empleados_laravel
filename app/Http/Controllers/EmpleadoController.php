<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use DB;

/**
 * Class EmpleadoController
 * @package App\Http\Controllers
 */
class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $empleados = Empleado::paginate();

        // return view('empleado.index', compact('empleados'))
        //     ->with('i', (request()->input('page', 1) - 1) * $empleados->perPage());


        $empleados=DB::table('empleados')
        ->join('puestos','puestos.id_puesto','=','empleados.id_puesto')
        ->select('empleados.id','empleados.codigo','empleados.nombres','empleados.apellidos','empleados.direccion','empleados.telefono','empleados.fecha_nacimiento','puestos.puesto as id_puesto')
        ->get();
       
        
        return view('empleado.prueba', compact('empleados'));
        // ->with('i', (request()->input('page', 1) - 1) * $veinte);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado = new Empleado();
        $puestos= DB::table('puestos')
        ->get();
        return view('empleado.create', compact('empleado','puestos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Empleado::$rules);

        $empleado = Empleado::create($request->all());

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);

        return view('empleado.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $puestos= DB::table('puestos')
        ->get();
        return view('empleado.edit', compact('empleado','puestos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Empleado $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        request()->validate(Empleado::$rules);

        $empleado->update($request->all());

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id)->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado deleted successfully');
    }
}
