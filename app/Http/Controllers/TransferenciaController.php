<?php

namespace App\Http\Controllers;

use App\Models\Transferencia as Transferencia;
use App\Models\Cuenta as Cuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransferenciaController extends Controller
{
    public function index()
    {
        $transferencia = new Transferencia();
        $transferencias =  $transferencia->getTransferenciasByUserAuth();
        return view('Tranferencias.transferencias')->with('transferencias', $transferencias);
    }

    public function propias()
    {
        $cuenta = new Cuenta();
        $cuentas = $cuenta->getCuentasAll();
        return view('Tranferencias.cuentasPropias')
            ->with('cuentas', $cuentas);
    }

    public function terceros()
    {
        $cuenta = new Cuenta();
        $cuentasOrigen = $cuenta->getCuentasAll();
        $cuentasTerceros = $cuenta->getCuentasTerceros();
        return view('Tranferencias.cuentasTerceros')
            ->with('cuentasOrigen', $cuentasOrigen)
            ->with('cuentasTerceros', $cuentasTerceros);
    }

    public function guardarPropia(Request $request)
    {
        $idCuentaOrigen = $request->idCuentaOrigen;
        $idCuentaDestino = $request->idCuentaDestino;
        $valor = $request->valor;

        $cuenta = new Cuenta();
        $cuentas = $cuenta->getCuentasAll();

        if ($valor <= 0) {
            return view('Tranferencias.cuentasPropias')
                ->with('cuentas', $cuentas)
                ->with('status', "El monto debe ser mayor a Cero!.");
        }

        if ($idCuentaOrigen == $idCuentaDestino) {
            return view('Tranferencias.cuentasPropias')
                ->with('cuentas', $cuentas)
                ->with('status', "No se puede realizar transferencia entre la misma cuenta!,");
        }
        $transferencia = new Transferencia();
        $status = $transferencia->transferirCuenta($idCuentaOrigen, $idCuentaDestino, $valor);
        return view('Tranferencias.cuentasPropias')
            ->with('cuentas', $cuentas)
            ->with('status', $status);
    }

    public function guardarTerceros(Request $request)
    {
        $idCuentaOrigen = $request->idCuentaOrigen;
        $idCuentaDestino = $request->idCuentaDestino;
        $valor = $request->valor;

        $cuenta = new Cuenta();
        $cuentasOrigen = $cuenta->getCuentasAll();
        $cuentasTerceros = $cuenta->getCuentasTerceros();

        if ($valor <= 0) {
            return view('Tranferencias.cuentasTerceros')
                ->with('cuentasOrigen', $cuentasOrigen)
                ->with('cuentasTerceros', $cuentasTerceros)
                ->with('status', "El monto debe ser mayor a Cero!.");
        }

        $transferencia = new Transferencia();
        $status = $transferencia->transferirCuenta($idCuentaOrigen, $idCuentaDestino, $valor);
        return view('Tranferencias.cuentasTerceros')
            ->with('cuentasOrigen', $cuentasOrigen)
            ->with('cuentasTerceros', $cuentasTerceros)
            ->with('status', $status);
    }
}
