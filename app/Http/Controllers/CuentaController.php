<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use Illuminate\Support\Facades\DB;
class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuenta = new Cuenta();
        $cuentas = $cuenta->getCuentasAll();
        return view('Layout.Cuenta.index')->with('cuentas', $cuentas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Layout.Cuenta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cuenta = new Cuenta();
        $cuenta->dni = $request->get('dni');
        $cuenta->nombre = $request->get('nombre');
        $cuenta->balance = $request->get('balance');
        $cuenta->save();

        return view('Layout.Cuenta.create')->with('status', 'Cuenta creada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuenta = Cuenta::find($id);
        return view('Layout.Cuenta.edit')->with('cuenta', $cuenta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cuenta = Cuenta::find($id);
        $cuenta->nombre = $request->get('nombre');
        $cuenta->balance = $request->get('balance');
        $cuenta->update();

        return view('Layout.Cuenta.edit')
            ->with('status', 'Cuenta Actualizada!')
            ->with('cuenta', $cuenta);                                    ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuenta = Cuenta::find($id);
        $cuenta->delete();
        return redirect('/cuenta');
    }

    public function getCuentasAll()
    {
        $cuenta = new Cuenta();
        $cuentas = $cuenta->getCuentasAll();
        return response()->json($cuentas);
    }

    public function getCuentasExcept(Request $request)
    {
        $cuenta = new Cuenta();
        $cuentas = $cuenta->getCuentasExcept($request->id);
        return response()->json($cuentas);
    }
}
